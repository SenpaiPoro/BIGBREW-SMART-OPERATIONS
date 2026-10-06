<?php 
$pageTitle  = 'Reports';
$activePage = 'reports';
require_once __DIR__ . '/include/header.php'; ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2">
                    <h4 class="mb-0">
                        <strong>Hotel</strong>
                    </h4>
                    <div class="d-flex gap-2">
                        <a href="index.php" class="btn btn-danger">
                            Back
                        </a>
                        <a href="addhotel.php" class="btn btn-primary">
                            Add Hotel
                        </a>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm mb-0 hotel-table">
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
                        <tbody class="table-hover">
                            <?php
                            $Data = Getdata("hotels");
                            if (mysqli_num_rows($Data) > 0) {
                                foreach ($Data as $DataList) {
                            ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars($DataList['name']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($DataList['address']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($DataList['code']); ?>
                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="edit_hotel.php?id=<?= $DataList['id']; ?>"
                                           class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                        <a href="hotel_view.php?id=<?= $DataList['id']; ?>"
                                           class="btn btn-primary btn-sm">
                                            View
                                        </a>
                                        <a href="include/deleteresume.php?id=<?= $DataList['id']; ?>"
                                           class="btn btn-danger btn-sm"
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
                                <td colspan="4" class="text-center py-4">
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
</div>






<?php require_once __DIR__ . '/include/footer.php'; ?>
    