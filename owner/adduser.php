<?php
include 'include/header.php';
?>

<div class="resume-page">
    <div class="resume-container">

        <!-- Page Heading -->
        <div class="resume-heading">
            <div>
                <span class="resume-eyebrow">PROFILE MANAGEMENT</span>
                <h2>Add Resume Information</h2>
                <p>Role</p>
            </div>

            <a href="resumelist.php" class="btn resume-back-btn">
                <span aria-hidden="true">&larr;</span>
                Back to Resume List
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
                    <h4>Add New Entry</h4>
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
                            Company or School Name
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="text"
                            id="resume-name"
                            name="name"
                            class="form-control"
                            placeholder="Enter the company or school name"
                            maxlength="255"
                            required
                        >
                    </div>

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="resume-title" class="form-label">
                            Position or Degree
                            <span class="required-mark">*</span>
                        </label>

                        <input
                            type="text"
                            id="resume-title"
                            name="title"
                            class="form-control"
                            placeholder="e.g., Cashier, Bachelor of Science in..."
                            maxlength="255"
                            required
                        >
                    </div>
                    <!-- Address -->
                    <div class="mb-4">
                        <label for="resume-address" class="form-label">
                            Address <span class="required-mark">*</span>
                        </label>
                        <input
                            type="text"
                            id="resume-address"
                            name="address"
                            class="form-control"
                            placeholder="Enter the company or school's address"
                            maxlength="255"
                            required
                        >
                    </div>
                    <!-- Year -->
                    <div class="mb-4">
                        <label for="resume-year" class="form-label">
                            Year <span class="required-mark">*</span>
                        </label>
                        <input
                            type="number"
                            id="resume-year"
                            name="year"
                            class="form-control"
                            placeholder="e.g., 2024"
                            min="1900"
                            max="<?= date('Y') + 10; ?>"
                            required
                        >
                    </div>
                    <!-- Description -->
                    <div class="mb-4">
                        <label for="resume-description" class="form-label">
                            Description <span class="required-mark">*</span>
                        </label>
                        <textarea
                            id="resume-description"
                            name="description"
                            class="form-control"
                            rows="4"
                            placeholder="Describe your responsibilities, achievements, or relevant details..."
                            required
                        ></textarea>
                        <div class="form-text">
                            Include relevant responsibilities, achievements, or educational details.
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="resume-form-footer">
                        <span class="resume-required-note">
                            <span class="required-mark">*</span>
                            Required fields
                        </span>

                        <div class="resume-form-actions">
                            <a href="resumelist.php"
                               class="btn resume-cancel-btn">
                                Cancel
                            </a>

                            <button
                                type="submit"
                                name="resume"
                                class="btn resume-submit-btn"
                            >
                                Save Resume Entry
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