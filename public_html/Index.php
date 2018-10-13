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
            <label for="company_name">Employee ID</label> 
            <input id="company_name" />
            <label for="company_token">Email</label> 
            <input id="company_token" />
            <label for="company_token">Card ID</label> 
            <input id="company_token" />
            <div class="flex-container-horizontal">
                <button> Login </button>
            </div>
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
                    alert("Contact button was clicked");
                    break;
                default:
                    alert("This button is not handled");
            }
            
        }  
    </script>
</body>
</html>
