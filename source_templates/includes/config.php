<?php
// config.php - Central configuration file

$site_name = "Tesla Mechanical Designs";
$site_url = "https://sheet-metal-design-alpha.vercel.app/";
$is_dark_mode = true;

// Default SEO values (can be overridden in individual pages BEFORE including header.php)
$page_title = isset($page_title) ? $page_title : "Sheet Metal Design Services | " . $site_name;
$page_description = isset($page_description) ? $page_description : "High-end engineering solutions for complex sheet metal components. From conceptual DFM to functional prototyping with extreme tolerances.";
$page_keywords = isset($page_keywords) ? $page_keywords : "Sheet Metal Design, DFM Analysis, Sheet Metal Fabrication, CNC Machining, Laser Cutting, Prototyping, Bend Allowance, Flat Pattern, Tesla Mechanical Designs";
$page_og_type = isset($page_og_type) ? $page_og_type : "website";
$page_og_image = isset($page_og_image) ? $page_og_image : $site_url . "/assets/cad_screenshot.png";
$page_canonical = isset($page_canonical) ? $page_canonical : $site_url;
$page_robots = isset($page_robots) ? $page_robots : "index, follow";
?>
