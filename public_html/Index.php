<?php
    if($_POST) 
    {
        include "php/Connection.php";
        $employee_id = filter_var($_POST['employee_id'],FILTER_SANITIZE_NUMBER_INT );
        $card_id = filter_var($_POST['card_id'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['employee_email'], FILTER_SANITIZE_EMAIL);

        $sql = 'SELECT *  FROM users WHERE e_mail = "'.$email.'" AND employee_id = '.$employee_id.' AND card_id = '.$card_id; 
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                if($row['active'] == 0){
                    die("user not found, please contact your company for more information"); 
                }
                header('Location: http://www.Google.com/');
                exit;
            }
        }
        $conn->close();
        exit;

    }
?>
<!DOCTYPE html>
<head> 
    <link href="css/style.css" rel="stylesheet">
    <title>First Catering ltd</title>
</head>
<html>
<body>
    <div class="header">
        <img src="img/logo.png">
        <h1> Welcome to First Catering ltd <h1>
        <h5 class="sign-in">Sign in</h5>
    </div>
    <div id="root">
        <div class="flex-container" id="fragment-selection">
            
            <button onclick="selectionButtonClick(this)" id="company-button">Company</button>
            <button onclick="selectionButtonClick(this)" id="employee-button">Employee</button>
            <button  onclick="selectionButtonClick(this)" id="contact-button"> Contact us</button>
            
        </div>
        <div class="flex-container" id="fragment-company-selection">
            <label for="company_name">Company Name</label> 
            <input id="company_name" />
            <label for="company_token">Token</label> 
            <input id="company_token" />
            <div class="flex-container-horizontal">
                <button> Require Token</button>
                <button> Login </button>
            </div>
        </div>
        <div class="flex-container" id="fragment-employee-selection">
        <form class="flex-container" action="index.php" method="post">
            <label for="employee_id">Employee ID</label> 
            <input id="employee_id" type="number" name="employee_id" maxlength="11" />

            <label for="employee_email">Email</label> 
            <input id="employee_email" type="email" name="employee_email" maxlength="50"/>

            <label for="card_id">Card ID</label> 
            <input id="card_id" type="number" name="card_id" maxlength="11"/>

            <div class="flex-container-horizontal">
                <button type="submit"> Login </button>
            </div>
        </form>
        </div>
    </div>
    <script>
        let root=document.getElementById("root");
        let fragment_employee_selection = ``;
        function selectionButtonClick(e) {
            switch(e.id){

                case "company-button" :
                    document.getElementById("fragment-selection").style.display = 'none';
                    document.getElementById("fragment-company-selection").style.display = 'block';
                    break;
                
                case "employee-button" :
                    document.getElementById("fragment-selection").style.display = 'none';
                    document.getElementById("fragment-employee-selection").style.display = 'block';
                    break;

                case "contact-button" :
                    <?php     
                        $to_email = 'testmail1908@gmail.com';
                        $subject = 'Testing PHP Mail';
                        $message = 'This mail is sent using the PHP mail function';
                        $headers = 'From:noreply@company.com';
                        mail($to_email,$subject,$message,$headers);
                        if (mail($to_email,$subject,$message,$headers)){
                            ?>alert("Successful"); <?php
                        }
                        else  ?>alert(<?php echo error_get_last()['message'];?>); <?php
                        
                    ?>
                    break;
                default:
                    alert("This button is not handled");
            }
            
        }  
    </script>
</body>
</html>
