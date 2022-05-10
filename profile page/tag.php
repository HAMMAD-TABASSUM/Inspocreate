

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple checkbox</title>
    <script src="https://cdn.tailwindcss.com"></script>
</header>
<body>
    <form action="chackbox.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th>product Name</th>
                    <th>product price</th>
                    <th>product Qulity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input class="outline-none border" id="car" name="prodid[]" type="checkbox" value="car"></td">
                    <td>car<input type="hidden" name="prodname[]" value="car"></td">
                </tr>
                <tr>
                    <td><input class="outline-none border " id="bike" name="prodid[]" type="checkbox" value="bike"></td">
                    <td>bike<input type="hidden" name="prodname[]" value="bike"></td">
                </tr>
                <tr>
                    <td><input class="outline-none border" id="accessorie" name="prodid[]" type="checkbox" value="Accessories"></td">
                    <td>Accessories<input type="hidden" name="prodname[]" value="Accessories"></td">
                </tr>
            </tbody>
        </table>
        <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit" name="submit">submit</button>
        </div>
    </form>
</body>
</html>