
<?php
include 'include/header.php';
?>

<div class="user-page">
    <div class="user-container">

        <!-- Page Heading -->
        <div class="user-page-heading">
            <div>
                <span class="user-eyebrow">USER MANAGEMENT</span>
                <h2>Add New User</h2>
                <p>Create an account and assign access privileges to your staff.</p>
            </div>

            <a href="user.php" class="user-back-btn">
                <span aria-hidden="true">&larr;</span>
                Back to Users
            </a>
        </div>

        <!-- Main Form Card -->
        <div class="user-card">

            <div class="user-card-header">
                <div class="user-header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="25" height="25"
                         viewBox="0 0 24 24"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="10" cy="7" r="4"/>
                        <path d="M20 8v6"/>
                        <path d="M23 11h-6"/>
                    </svg>
                </div>

                <div>
                    <h4>Account Information</h4>
                    <p>Enter the details required to register a new user.</p>
                </div>
            </div>

            <div class="user-card-body">

                <form action="../config/code.php"
                      method="POST"
                      class="user-form"
                      id="addUserForm">

                    <input
                        type="hidden"
                        name="user_id"
                        value="<?= htmlspecialchars((string)($id ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                    >

                    <!-- PERSONAL INFORMATION -->
                    <div class="user-form-section">
                        <div class="user-section-heading">
                            <span class="user-section-number">01</span>
                            <div>
                                <h5>Personal Information</h5>
                                <p>Basic information about the account holder.</p>
                            </div>
                        </div>

                        <div class="user-form-grid">

                            <div class="user-field">
                                <label for="first_name">
                                    First Name <span>*</span>
                                </label>
                                <input
                                    type="text"
                                    id="first_name"
                                    name="first_name"
                                    class="form-control"
                                    placeholder="Enter first name"
                                    maxlength="255"
                                    autocomplete="given-name"
                                    required
                                >
                            </div>

                            <div class="user-field">
                                <label for="last_name">
                                    Last Name <span>*</span>
                                </label>
                                <input
                                    type="text"
                                    id="last_name"
                                    name="last_name"
                                    class="form-control"
                                    placeholder="Enter last name"
                                    maxlength="255"
                                    autocomplete="family-name"
                                    required
                                >
                            </div>

                        </div>
                    </div>

                    <!-- ACCOUNT DETAILS -->
                    <div class="user-form-section">
                        <div class="user-section-heading">
                            <span class="user-section-number">02</span>
                            <div>
                                <h5>Account Credentials</h5>
                                <p>Set the username and password for login access.</p>
                            </div>
                        </div>

                        <div class="user-form-grid">

                            <div class="user-field full-width">
                                <label for="username">
                                    Username <span>*</span>
                                </label>
                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    class="form-control"
                                    placeholder="Create a username"
                                    maxlength="255"
                                    autocomplete="username"
                                    required
                                >
                            </div>

                            <div class="user-field">
                                <label for="password">
                                    Password <span>*</span>
                                </label>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Enter password"
                                    minlength="8"
                                    autocomplete="new-password"
                                    required
                                >
                                <small>Use at least 8 characters.</small>
                            </div>

                            <div class="user-field">
                                <label for="confirm_password">
                                    Confirm Password <span>*</span>
                                </label>
                                <input
                                    type="password"
                                    id="confirm_password"
                                    name="confirm_password"
                                    class="form-control"
                                    placeholder="Re-enter password"
                                    minlength="8"
                                    autocomplete="new-password"
                                    required
                                >
                            </div>

                        </div>
                    </div>

                    <!-- ROLE ASSIGNMENT -->
                    <div class="user-form-section">
                        <div class="user-section-heading">
                            <span class="user-section-number">03</span>
                            <div>
                                <h5>Role Assignment</h5>
                                <p>Select the access level for this account.</p>
                            </div>
                        </div>

                        <div class="user-field">
                            <label for="type">
                                User Role <span>*</span>
                            </label>

                            <select
                                id="type"
                                name="type"
                                class="form-select"
                                required
                            >
                                <option value="Manager">Manager</option>
                                <option value="employee">Employee</option>
                            </select>

                            <small>
                                The assigned role determines which system features the user can access.
                            </small>
                        </div>
                    </div>

                    <!-- FORM ACTIONS -->
                    <div class="user-form-footer">

                        <p>
                            <span>*</span> Required fields
                        </p>

                        <div class="user-form-actions">
                            <a href="user.php" class="user-cancel-btn">
                                Cancel
                            </a>

                            <button
                                type="submit"
                                name="user_add"
                                class="user-submit-btn"
                            >
                                Create User
                                <span aria-hidden="true">&rarr;</span>
                            </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>

        <p class="user-footer-note">
            Make sure all account information is correct before creating the user.
        </p>

    </div>
</div>

<script>
document.getElementById('addUserForm').addEventListener('submit', function (event) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
        event.preventDefault();
        alert('Passwords do not match. Please check your entries.');
        document.getElementById('confirm_password').focus();
    }
});
</script>

<?php include 'include/footer.php'; ?>
