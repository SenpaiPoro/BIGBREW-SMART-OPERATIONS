<?php
include 'include/header.php';
?>

<div class="resume-page">
    <div class="resume-container">

        <!-- Page Heading -->
        <div class="resume-heading">
            <div>
                <span class="resume-eyebrow">Add User</span>
                <h2>Add Bigbrew Smart Operation User</h2>
            </div>

            <a href="userlist.php" class="btn resume-back-btn">
                <span aria-hidden="true">&larr;</span>
                Back to user List
            </a>
        </div>
        <!-- Resume Form Card -->
        <div class="card resume-card">
            <div class="resume-card-header">
                <div class="resume-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="25" height="25"
                         viewBox="0 0 24 24"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8"
                         stroke-linecap="round"
                         stroke-linejoin="round">
                        <rect x="5" y="3" width="14" height="18" rx="2"></rect>
                        <path d="M9 8h6"></path>
                        <path d="M9 12h6"></path>
                        <path d="M9 16h4"></path>
                    </svg>
                </div>

                <div>
                    <h4>Add New User</h4>
                    <p>Complete the information below.</p>
                </div>
            </div>
            <div class="card-body resume-card-body">

                <form action="../config/code.php"
                      method="POST"
                      class="resume-form">

                    <input
                        type="hidden"
                        name="user_id"
                        value="<?= htmlspecialchars((string)($id ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                    >
                    <!-- Type -->
                    <div class="mb-4">
                        <label for="resume-type" class="form-label">
                            ROLE<span class="required-mark">*</span>
                        </label>

                        <select
                            id="resume-type"
                            name="type"
                            class="form-select"
                            required
                        >
                            <option value="Manager">Manager</option>
                            <option value="employee">Employee</option>
                        </select>
                    </div>
                    <!-- Company / School -->
                    <div class="mb-4">
                        <label for="resume-name" class="form-label">
                            First Name
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="text"
                            id="resume-name"
                            name="first_name"
                            class="form-control"
                            placeholder="Enter first name"
                            maxlength="255"
                            required
                        >
                    </div>

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="resume-title" class="form-label">
                           Last Name
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="text"
                            id="resume-title"
                            name="last_name"
                            class="form-control"
                            placeholder="e.g., Cashier, Bachelor of Science in..."
                            maxlength="255"
                            required
                        >
                    </div>
                    <!-- Address -->
                    <div class="mb-4">
                        <label for="resume-address" class="form-label">
                            username <span class="required-mark">*</span>
                        </label>
                        <input
                            type="text"
                            id="resume-address"
                            name="username"
                            class="form-control"
                            placeholder="Enter your username"
                            maxlength="255"
                            required
                        >
                    </div>
                    <!-- Description -->
                    <div class="mb-4">
                        <label for="resume-description" class="form-label">
                            Password <span class="required-mark">*</span>
                        </label>
                        <input
                            id="resume-description"
                            name="password"
                            type="password"
                            class="form-control"
                            rows="4"
                            placeholder="Enter your password"
                            required
                        ></input>
                     
                    </div>
                    <div class="mb-4">
                        <label for="resume-description" class="form-label">
                            confirm Password <span class="required-mark">*</span>
                        </label>
                        <input
                            id="resume-description"
                            name="confirm_password"
                            type="password"
                            class="form-control"
                            rows="4"
                            placeholder="Confirm your password"
                            required
                        ></input>
                    </div>

                    <!-- Actions -->
                    <div class="resume-form-footer">

                        <div class="resume-form-actions">
                            <a href="resumelist.php"
                               class="btn resume-cancel-btn">
                                Cancel
                            </a>

                            <button
                                type="submit"
                                name="user_add"
                                class="btn resume-submit-btn"
                            >
                                Add new user
                                <span aria-hidden="true">&rarr;</span>
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <p class="resume-footer-note">
            Make sure the information is accurate before saving your entry.
        </p>

    </div>
</div>

<?php include 'include/footer.php'; ?>
```