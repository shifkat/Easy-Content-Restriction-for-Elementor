<p align="center">
  <img src="https://capsule-render.vercel.app/render?type=soft&color=auto&height=200&section=header&text=Easy%20Content%20Restriction&fontSize=50" alt="Header" />
</p>

# 🔒 Easy Content Restriction for Elementor

<p align="left">
  <img src="https://img.shields.io/badge/WordPress-v6.0+-21759b?style=for-the-badge&logo=wordpress&logoColor=white" />
  <img src="https://img.shields.io/badge/Elementor-v3.0+-92003B?style=for-the-badge&logo=elementor&logoColor=white" />
  <img src="https://img.shields.io/badge/License-GPL--2.0-green?style=for-the-badge" />
</p>

A premium, lightweight Elementor extension designed to restrict specific containers or sections with a sophisticated **"Zolo-style" blur effect**. Featuring a seamless iFrame modal login system, it ensures users never leave the page to sign in, providing a top-tier user experience.

---

## ✨ Key Features

<table>
  <tr>
    <td width="50%"><strong>🖱️ One-Click Restriction</strong><br>Simply toggle the restriction on any Elementor container via the standard control panel.</td>
    <td width="50%"><strong>🌫️ Premium Blur Effect</strong><br>Sophisticated glassmorphism overlay with high-quality CSS filters.</td>
  </tr>
  <tr>
    <td><strong>🔲 Floating Modal Login</strong><br>Opens WP/LoginPress forms in a centered, floating popup for a native feel.</td>
    <td><strong>🔄 Intelligent Auto-Refresh</strong><br>Detects successful login inside the iFrame and automatically reveals content.</td>
  </tr>
  <tr>
    <td><strong>🚀 Performance First</strong><br>Zero dependencies. No heavy JS libraries. Lightweight and fast.</td>
    <td><strong>⚡ Cache Buster</strong><br>Includes timestamp-based redirects to bypass aggressive server caching.</td>
  </tr>
</table>

---

## 🚀 Installation

1. **Download** the repository as a `.zip` file.
2. **Upload** to your WordPress site via `Plugins > Add New > Upload Plugin`.
3. **Activate** the plugin.
4. *(Optional)* Install **LoginPress** to style the login form inside the popup to match your building brand.

---

## 🛠️ Usage Guide

1. **Edit with Elementor:** Open any page or template.
2. **Select Container:** Click on the Container or Section you wish to protect.
3. **Toggle Lock:** Go to the **Content** tab and find the **🔒 Restriction** section.
4. **Enable:** Set *Restrict this content?* to **Yes**.
5. **Save:** Update the page. Logged-out users will now see the premium blur overlay.

---

## 📁 Project Structure

```text
easy-content-restriction-for-elementor/
├── assets/
│   └── css/
│       └── premium-ui.css      # Custom blur & modal styling
├── includes/
│   ├── controls.php            # Elementor UI Control definitions
│   └── filter-logic.php        # Frontend wrapping & Refresh logic
└── easy-content-restriction-for-elementor.php  # Main Plugin Entry
