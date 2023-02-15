<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Web App for Tax Calculation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('gradient backgorund.png');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .calculator {
            background-color: #FAFAD2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 30%;
            height: 65vh;
            padding: 1rem;
            border: 2px solid #80471C;
            border-radius: 0.5rem;
        }

        h1 {
            text-align: center;
        }

        .form-section {
            display: flex;
            justify-content: center;
            width: 100%;
            text-align: left;
        }

        button.btn.btn-secondary {
            height: 50px;
            width: 200px;
            font-size: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: fit-content;
        }

        .result-section {
            justify-content: center;
            width: 100%;
            text-align: center;
            padding-top: 3rem;
        }
    </style>
</head>

<body>
    <div class="calculator">
        <h1>Taxxy: The Tax Calculator</h1>
        <div class="form-section">
            <form>
                <br>
                <div class="form-group">
                    <label for="salary">Salary:</label>
                    <input type="text" class="form-control" id="salary" name="salary" placeholder="Input Salary Here">
                </div>

                <div class="form-group">
                    <label for="Type">Type:</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Type" id="bi-monthly" value="Bi-Monthly">
                        <label class="form-check-label" for="bi-monthly">Bi-Monthly</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Type" id="monthly" value="Monthly">
                        <label class="form-check-label" for="monthly">Monthly</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-secondary"
                    onclick="event.preventDefault(); computeTax();">Compute</button>
            </form>
        </div>
        <div class="result-section">
            Annual Salary: <span id="annualSalary">PHP 0.00</span> <br>
            Est. Annual Tax: <span id="estimatedAnnualTax">PHP 0.00</span> <br>
            Est. Monthly Tax: <span id="estimatedMonthlyTax">PHP 0.00</span> <br>
        </div>
</body>

<script>
    function computeTax() {
        const salary = parseFloat(document.querySelector("input[name=salary]").value);

        if (isNaN(salary)) {
            alert("Please enter a valid value for salary.");
            return;
        }

        let annualSalary = salary;
        if (document.querySelector("input[name=Type]:checked").value === "Bi-Monthly") {
            annualSalary = salary * 24;
        } else {
            annualSalary = salary * 12;
        }

        let tax = 0;
        if (annualSalary > 8000000) {
            tax = 2410000 + (annualSalary - 8000000) * 0.35;
        } else if (annualSalary > 2000000) {
            tax = 490000 + (annualSalary - 2000000) * 0.32;
        } else if (annualSalary > 800000) {
            tax = 130000 + (annualSalary - 800000) * 0.3;
        } else if (annualSalary > 400000) {
            tax = 30000 + (annualSalary - 400000) * 0.25;
        } else if (annualSalary > 250000) {
            tax = (annualSalary - 250000) * 0.2;
        }

        const monthlyTax = tax / 12;
        document.querySelector("input[name=salary]").addEventListener("input", function (event) {
            if (!event.target.value.match(/^\d+$/)) {
                event.target.value = event.target.value.slice(0, -1);
            }
        });
        document.querySelector("#annualSalary").innerHTML = "PHP " + annualSalary.toFixed(2);
        document.querySelector("#estimatedAnnualTax").innerHTML = "PHP " + tax.toFixed(2);
        document.querySelector("#estimatedMonthlyTax").innerHTML = "PHP " + monthlyTax.toFixed(2);
    }
</script>

</html>