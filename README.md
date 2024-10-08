# About the Database Architecture

This document outlines the database structure for the application. For a visual representation, refer to the database diagram in `database/diagrams/payd.pdf`.

## Table Descriptions

### `countries` Table:

- **Purpose**: Stores country information.
- **Fields**:
  - `id_country`: Primary key (unique identifier for each country).
  - `des_country`: String field holding the name or description of the country.

### `forms` Table:

- **Purpose**: Represents a collection of fields that belong to a specific form. Each form is uniquely tied to a country.
- **Fields**:
  - `id_form`: Primary key (unique identifier for each form).
  - `id_country`: Foreign key referencing `countries(id_country)` to associate a form with a specific country.
- **Relationships**:
  - One-to-one relationship with the `countries` table (i.e., each country can have exactly one form).

### `fields` Table:

- **Purpose**: Represents individual form fields that can be dynamically added, removed, or edited.
- **Fields**:
  - `id_field`: Primary key (unique identifier for each field).
  - `name`: String field representing the name of the form field.
  - `required`: Boolean indicating whether the field is mandatory.
  - `options`: JSON field holding additional options for the field (e.g., choices for select inputs).
  - `validation_rules`: JSON field containing validation constraints (e.g., min/max length, data type).
  - `value`: Default value for the field.
  - `id_field_type`: Foreign key referencing `field_types(id_field_type)` to indicate the type of the field (e.g., text, checkbox, etc.).
  - `id_field_cat`: Foreign key referencing `field_categories(id_field_cat)` to associate the field with a specific category.

### `field_types` Table:

- **Purpose**: Holds possible types for fields (e.g., text, number, date, etc.).
- **Fields**:
  - `id_field_type`: Primary key (unique identifier for each field type).
  - `des_field_type`: String field describing the field type.

### `field_categories` Table:

- **Purpose**: Holds possible categories for fields like (e.g., general, identity, or bank-related).
- **Fields**:
  - `id_field_cat`: Primary key (unique identifier for each field category).
  - `des_field_cat`: String field describing the field category.

### `form_field` Pivot Table:

- **Purpose**: Links forms and fields in a many-to-many relationship. A form can have multiple fields, and a field can be shared by multiple forms and that eliminate redendency .
- **Fields**:
  - `id_form`: Foreign key referencing `forms(id_form)`.
  - `id_field`: Foreign key referencing `fields(id_field)`.
- **Primary Key**: Composite primary key consisting of `id_form` and `id_field`.

### `users` Table:

- **Purpose**: Stores essential metadata about registered users, such as their unique identifier and the form they filled out. However, the actual information about each user (e.g., name, contact details) is not stored directly in this table. Instead, user-specific data is managed dynamically through **user_inputs** table.
- **Fields**:
  - `id_user`: Primary key (unique identifier for each user).
  - `id_form`: Foreign key referencing `forms(id_form)` to link each user to a specific form they filled out.
  - `added`: Timestamp when the user was added to the system.

### `user_input` Pivot Table:

- **Purpose**: Stores the inputs for each field that a user has filled out. Links users and fields in a many-to-many relationship with the values submitted by the users.
- **Fields**:
  - `id_user`: Foreign key referencing `users(id_user)`.
  - `id_field`: Foreign key referencing `fields(id_field)`.
  - `value`: String field that holds the value the user entered for a particular field.
- **Primary Key**: Composite primary key consisting of `id_user` and `id_field`.
