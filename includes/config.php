<?php
// config.php - Central configuration file

$site_name = "Tesla Mechanical Designs";
$is_dark_mode = true;

// Default SEO values (can be overridden in individual pages BEFORE including header.php)
$page_title = isset($page_title) ? $page_title : "Sheet Metal Design Services | " . $site_name;
$page_description = isset($page_description) ? $page_description : "High-end engineering solutions for complex sheet metal components. From conceptual DFM to functional prototyping with extreme tolerances.";
$page_keywords = isset($page_keywords) ? $page_keywords : "Sheet Metal, DFM, Fabrication, CNC Machining, Laser Cutting, Prototyping, Tesla Mechanical Designs";
$page_og_type = isset($page_og_type) ? $page_og_type : "website";
$page_og_image = isset($page_og_image) ? $page_og_image : "assets/cad_screenshot.png";
?>
