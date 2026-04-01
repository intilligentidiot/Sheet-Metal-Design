import { Resend } from 'resend';

const resend = new Resend(process.env.RESEND_API_KEY);
const RECAPTCHA_SECRET_KEY = process.env.RECAPTCHA_SECRET_KEY;

export default async function handler(req, res) {
  if (req.method !== 'POST') {
    return res.status(405).json({ error: 'Method Not Allowed' });
  }

  try {
    // 1. Parse Form Body
    // Vercel auto-parses JSON and URL-encoded bodies in Node.js
    const body = req.body;
    const captchaToken = body['g-recaptcha-response'];

    if (!captchaToken) {
      return res.status(400).send('reCAPTCHA token is missing. Please try again.');
    }

    // 2. Verify reCAPTCHA with Google
    const verifyUrl = `https://www.google.com/recaptcha/api/siteverify?secret=${RECAPTCHA_SECRET_KEY}&response=${captchaToken}`;
    const recaptchaRes = await fetch(verifyUrl, { method: 'POST' });
    const recaptchaJson = await recaptchaRes.json();

    if (!recaptchaJson.success) {
      console.error('reCAPTCHA failed:', recaptchaJson['error-codes']);
      return res.status(403).send('Verification failed. Bot detected.');
    }

    // 3. Send Email via Resend
    const { firstName, lastName, email, subject, message } = body;
    
    await resend.emails.send({
      from: 'Contact Form <onboarding@resend.dev>', // Update this after domain verification
      to: 'support@teslamechanicaldesigns.com', // Your target email
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

    // 4. Redirect on Success
    return res.redirect(303, '/thank-you.html');

  } catch (error) {
    console.error('Submission Error:', error);
    return res.status(500).send('Internal Server Error. Please try again later.');
  }
}
