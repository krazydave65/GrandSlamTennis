
<div class="container">
    <div class="jumbotron">
        <h1>Admin Page</h1>
    </div>

    <?php
        //Alerts for adding data to DB
        //Display result of "Add User"
        if ($this->session->flashdata("add_user_success") || 
            $this->session->flashdata("add_user_failed")){

            if ($this->session->flashdata("add_user_success")){
                echo("<div class='alert alert-success' role='alert'>");
                echo($this->session->flashdata("add_user_success"));
                echo("</div>");
            }
            elseif ($this->session->flashdata("add_user_failed")){
                echo("<div class='alert alert-danger' role='alert'>");
                echo($this->session->flashdata("add_user_failed"));
                echo("</div>");
            }
        }

        if ($this->session->flashdata("add_user_validation")){
            $error_messages_array = $this->session->flashdata("add_user_validation");

            echo("<div class='alert alert-warning' role='alert'>");
            foreach ($error_messages_array as $message){
                echo($message);
            }
            echo("</div>");
        }
    ?>


    <!-- Page Content -->
    <h2>All Members</h2>
    <div style="overflow: auto; height:200px;">
        <table class="table table-hover table-responsive">
            <thead>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Registered Date</th>
                <th>Admin Rights</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if (isset($users)){
                    foreach ($users as $user) {
                        echo("<tr>"
                                . "<td>". $user->username . "</td>"
                                . "<td>". $user->first_name . "</td>"
                                . "<td>". $user->last_name . "</td>"
                                . "<td>". $user->email . "</td>"
                                . "<td>". $user->registered_date . "</td>"
                                . "<td>". ($user->admin_rights == 1 ? "Yes":"No") . "</td>"
                                . "<td><a href='#'><span class='glyphicon glyphicon-pencil'></span></a> 
                                    <a href='#'><span class='glyphicon glyphicon-trash'></span></a></td>"
                            . "</tr>"
                        );        
                    }
                }
            ?>
            </tbody>
        </table>
    </div>

    <h2>Add New Users</h2>
    <form action="adminschedulelocation/AddNewUser" method="post">
        First Name: <input type="text" name="first_name" required><br>
        Last Name: <input type="text" name="last_name" required><br>
        Username: <input type="text" name='username' required minlength="3"><br>
        Email: <input type="text" name='email' required><br>
        Password: <input type="text" name='password' required minlength="3"><br>
        Password confirm: <input type="text" name='passwordconfirm' required minlength="3"><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Locations</h2>
    <div style="overflow: auto; height:200px;">
        <table class="table table-hover table-responsive">
            <thead>
            <tr>
                <th>Locations</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if (isset($locations)){
                    foreach ($locations as $location) {
                        echo("<tr>"
                                . "<td>". $location->name . "</td>"
                                . "<td><a href='#'><span class='glyphicon glyphicon-pencil'></span></a> 
                                    <a href='#'><span class='glyphicon glyphicon-trash'></span></a></td>"
                            . "</tr>"
                        );        
                    }
                }
            ?>
            </tbody>
        </table>
    </div>

</div>



