# Better PayPal Donate

*Copyright 2017 Caleb Evans*  
*Released under the GNU General Public License v2.0*

Better PayPal Donate is a WordPress plugin I created because other PayPal donate
plugins were too complicated or feature-lacking for my needs. The project is
currently under development, so expect many of the below features to be missing.

## Features

### Fields

- Title
- Description
- Purpose
- Default Amount (in USD)
- Button Text

## Widget

The plugin provides a widget with all of the above fields, so it can be easily
integrated into your existing theme.

### Shortcode

The plugin also provides a `[donate-button]` shortcode, as shown below. Note
that since this shortcode can be inserted into any post content, `title` and
`description` fields are redundant and therefore unsupported.

```
Help support the work of missions around the globe.

[donate-button purpose="Missions" amount="100"]Give[/donate-button]
```

### Note about styling

This plugin adds no styling to the widget or shortcode beyond what your theme
already styles. If you wish to apply custom styling to the widget, you can do so by targeting `.better-paypal-donate-widget` and its children via CSS:

```css
.better-paypal-donate-widget button {
  border: solid 1px #390;
  background-color: #6c3;
  color: #fff;
}
```
