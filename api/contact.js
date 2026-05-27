import { Resend } from 'resend';

const RESEND_API_KEY = process.env.RESEND_API_KEY;
const RECAPTCHA_SECRET_KEY = process.env.RECAPTCHA_SECRET_KEY;

export default async function handler(req, res) {
  if (req.method !== 'POST') {
    return res.status(405).json({ error: 'Method Not Allowed' });
  }

  try {
    // 0. Environment Check
    if (!RESEND_API_KEY || !RECAPTCHA_SECRET_KEY) {
      console.error('Environment variables missing: RESEND_API_KEY or RECAPTCHA_SECRET_KEY');
      return res.status(500).json({ 
        error: 'Backend configuration error. Please ensure environment variables are set in Vercel.',
        details: 'Missing Required API Keys'
      });
    }

    // 1. Parse Form Body
    const body = req.body;
    if (!body || typeof body !== 'object') {
      return res.status(400).json({ error: 'Invalid request body' });
    }

    const captchaToken = body['g-recaptcha-response'];
    if (!captchaToken) {
      return res.status(400).json({ error: 'reCAPTCHA token is missing. Please complete the captcha.' });
    }

    // 2. Verify reCAPTCHA with Google
    const verifyUrl = `https://www.google.com/recaptcha/api/siteverify?secret=${RECAPTCHA_SECRET_KEY}&response=${captchaToken}`;
    const recaptchaRes = await fetch(verifyUrl, { method: 'POST' });
    const recaptchaJson = await recaptchaRes.json();

    if (!recaptchaJson.success) {
      console.error('reCAPTCHA failed:', recaptchaJson['error-codes']);
      return res.status(403).json({ 
        error: 'Verification failed. Please try the captcha again.',
        codes: recaptchaJson['error-codes']
      });
    }

    // 3. Send Email via Resend
    const { firstName, lastName, email, subject, message } = body;
    const resend = new Resend(RESEND_API_KEY);
    
    const { error: sendError } = await resend.emails.send({
      from: 'TMD Contact Form <onboarding@resend.dev>', // Update this after domain verification
      to: 'modelingstructuralbim@gmail.com', // Your target email
      subject: `TMD Inquiry: ${subject}`,
      html: `
        <h2>New Project Inquiry</h2>
        <p><strong>Name:</strong> ${firstName} ${lastName}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Subject:</strong> ${subject}</p>
        <p><strong>Message:</strong></p>
        <p>${message.replace(/\n/g, '<br>')}</p>
      `
    });

    if (sendError) {
      console.error('Resend Error:', sendError);
      return res.status(500).json({ error: 'Email delivery failed. Please contact us directly.' });
    }

    // 4. Redirect on Success
    return res.redirect(303, '/thank-you.html');

  } catch (error) {
    console.error('Submission Error:', error);
    return res.status(500).json({ 
      error: 'An unexpected error occurred.',
      message: error.message 
    });
  }
}
