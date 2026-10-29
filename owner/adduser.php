<?php include 'include/header.php'; ?>

    <div class="row"></div>
 <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    <b>Resume</b>
                     <a href="resumelist.php" class="btn btn-danger float-end"> Back </a> 
                </h4>

            </div>
            <div class="card-body">
              

                <form action="../config/code.php" method="POST" enctype="multipart/form-data">

                <div class="form-floating">
                </div>

                <input type="hidden" name="user_id" require class="form-control" value="<?php echo $id;?>">

                 <label>Type:</label>
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="type">
                            <option value="Experience">
                                Experience
                            </option>
                            <option value="Education">
                                Education
                            </option>
                        </select>
                    <div class="mb-3">
                        <label> Name of Company/School</label>
                        <input type="text" name="name" require class="form-control">
                    </div>
                    <div class="mb-3">
                        <label> Title: </label>
                        <input type="text" name="title" require class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label> Address: </label>
                        <input type="text" name="address" require class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label> Description: </label>
                        <textarea name="description" require class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label> Year: </label>
                        <input type="number" name="year" require class="form-control" >
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" name="resume" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php include 'include/footer.php'; ?>

