<?php 
$pageTitle  = 'Reports';
$activePage = 'reports';
require_once __DIR__ . '/include/header.php'; ?>
<div class="reports-page">

    <div class="reports-card">
        <!-- Header -->
        <div class="reports-card-header">
            <div class="reports-header-content">
                <div>
                    <h2 class="reports-title">Account users</h2>
                    <p class="reports-subtitle">Manage account users and their permissions</p>
                </div>

                <div class="reports-actions">
                    <a href="index.php" class="reports-btn reports-btn-secondary">
                        Back
                    </a>
                    <a href="adduser.php" class="reports-btn reports-btn-primary">
                        User
                    </a>
                </div>

            </div>
        </div>

        <!-- Table -->
        <div class="reports-card-body">
            <div class="reports-table-wrapper">
                <table class="reports-table">
                    <thead>
                        <tr>
                            <th class="name-column">
                                Name
                            </th>

                            <th class="address-column">
                                Address
                            </th>

                            <th class="code-column">
                                Code
                            </th>

                            <th class="action-column">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $Data = Getdata("account");

                        if (mysqli_num_rows($Data) > 0) {

                            foreach ($Data as $DataList) {
                        ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($DataList['name'] ?? ''); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($DataList['address'] ?? ''); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($DataList['code'] ?? ''); ?>
                            </td>

                            <td>

                                <div class="reports-row-actions">

                                    <a
                                        href="edit_hotel.php?id=<?= $DataList['id']; ?>"
                                        class="reports-action reports-action-edit">
                                        Edit
                                    </a>

                                    <a
                                        href="hotel_view.php?id=<?= $DataList['id']; ?>"
                                        class="reports-action reports-action-view">
                                        View
                                    </a>

                                    <a
                                        href="include/deleteresume.php?id=<?= $DataList['id']; ?>"
                                        class="reports-action reports-action-delete"
                                        onclick="return confirm('Are you sure you want to delete this experience?');">
                                        Delete
                                    </a>

                                </div>

                            </td>

                        </tr>

                        <?php
                            }

                        } else {
                        ?>

                        <tr>
                            <td colspan="4" class="reports-empty">
                                No Record!
                            </td>
                        </tr>

                        <?php
                        }
                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<?php require_once __DIR__ . '/include/footer.php'; ?>
    