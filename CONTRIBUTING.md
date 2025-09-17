# Contributing to FOB Trustpilot Plugin

First off, thank you for considering contributing to the FOB Trustpilot plugin! It's people like you that make this plugin better for everyone.

## Code of Conduct

By participating in this project, you are expected to uphold our values of being respectful and professional. Please be considerate in your interactions with other contributors.

## How Can I Contribute?

### Reporting Bugs

Before creating bug reports, please check existing issues to avoid duplicates. When you create a bug report, please include as many details as possible:

- **Use a clear and descriptive title** for the issue
- **Describe the exact steps to reproduce the problem**
- **Provide specific examples** to demonstrate the steps
- **Describe the behavior you observed** and explain why it's a problem
- **Explain the behavior you expected** to see instead
- **Include screenshots** if applicable
- **Include your environment details** (PHP version, Botble CMS version, browser, etc.)

### Suggesting Enhancements

Enhancement suggestions are welcome! Please provide:

- **A clear and descriptive title** for the suggestion
- **A detailed description** of the proposed functionality
- **Explain why this enhancement would be useful** to most users
- **List any similar features** in other plugins or systems

### Pull Requests

1. Fork the repository and create your branch from `main`
2. Make your changes following our coding standards
3. Ensure your code passes all tests
4. Update documentation if needed
5. Submit your pull request with a clear description

## Development Setup

1. Clone the repository to `platform/plugins/fob-trustpilot`
2. Install dependencies:
   ```bash
   composer install
   ```
3. Activate the plugin in Botble CMS admin panel

## Coding Standards

### PHP Standards

- Follow PSR-12 coding standards
- Use PHP 8.0+ features appropriately
- Prefer helpers over facades in Botble CMS context
- Use type hints and return types
- Add PHPDoc comments for complex methods

### File Naming Conventions

- **Files**: kebab-case (e.g., `trustpilot-widget.php`)
- **Classes**: PascalCase (e.g., `TrustpilotService`)
- **Methods**: camelCase (e.g., `getWidgetHtml`)
- **Variables/Properties**: snake_case (e.g., `$business_unit_id`)
- **Constants**: SCREAMING_SNAKE_CASE (e.g., `DEFAULT_WIDGET_TYPE`)

### Database Queries

Use query builder with `query()` method for IDE completion:

```php
// Good
User::query()->where('status', 'active')->get();

// Avoid
User::where('status', 'active')->get();
```

### Translations

- Admin texts use `trans()` function
- Frontend texts use `__()` function
- All text must be translatable

### Security

- Always validate and sanitize input
- Use proper escaping for output
- Never commit sensitive data
- Follow OWASP security guidelines

## Testing

Before submitting your changes:

1. Check PHP syntax:
   ```bash
   find . -name "*.php" -exec php -l {} \;
   ```

2. Run static analysis:
   ```bash
   ./vendor/bin/phpstan analyse --level 5
   ```

3. Format code:
   ```bash
   ./vendor/bin/pint
   ```

4. Test the plugin functionality:
   - Enable/disable the plugin
   - Configure settings
   - Test all widget types
   - Verify shortcodes work
   - Check admin widget functionality

## Documentation

- Update README.md if you change functionality
- Add PHPDoc comments for new methods
- Update CHANGELOG.md with your changes
- Include inline comments for complex logic

## Commit Messages

- Use clear and descriptive commit messages
- Start with a verb (Add, Fix, Update, Remove, etc.)
- Keep the first line under 50 characters
- Reference issues when applicable

Examples:
- `Add support for new widget type`
- `Fix validation error for Business Unit ID`
- `Update documentation for helper functions`
- `Remove deprecated display_pages setting`

## Versioning

We use [Semantic Versioning](https://semver.org/):
- MAJOR version for incompatible API changes
- MINOR version for backwards-compatible functionality
- PATCH version for backwards-compatible bug fixes

## Questions?

Feel free to contact us:
- Email: contact@friendsofbotble.com
- Website: [friendsofbotble.com](https://friendsofbotble.com)

## License

By contributing, you agree that your contributions will be licensed under the MIT License.