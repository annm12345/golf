<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Add horizontal scrollbar if necessary */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            min-width: 30px;
        }

        th {
            background-color: #3498db;
            color: white;
            position: sticky;
            top: 0;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td.selected {
            background-color: #e74c3c;
            color: white;
        }

        @media (max-width: 768px) {
            th, td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: center;
            font-size: 10px;
            min-width: 15px;
        }
            
        }
    </style>
</head>
<body>
    <table id="myTable">
        <thead>
            <tr >
                <td>(w)Tee</td>
                <td>374</td>
                <td>389</td>
                <td>552</td>
                <td>203</td>
                <td>547</td>
                <td>181</td>
                <td>467</td>
                <td>397</td>
                <td>417</td>
                <td>3522</td>
                <td>404</td>
                <td>553</td>
                <td>154</td>
                <td>433</td>
                <td>431</td>
                <td>196</td>
                <td>291</td>
                <td>409</td>
                <td>400</td>
                <td>3373</td>
                <td>Total</td>
                <td>Par</td>
                <td>Birdie</td>
                <td>HC</td>
                <td></td>
                <td></td>
            </tr>
            <tr style="background:lightgreen">
                <td>(M)Tee</td>
                <td>374</td>
                <td>389</td>
                <td>552</td>
                <td>203</td>
                <td>547</td>
                <td>181</td>
                <td>467</td>
                <td>397</td>
                <td>417</td>
                <td>3522</td>
                <td>404</td>
                <td>553</td>
                <td>154</td>
                <td>433</td>
                <td>431</td>
                <td>196</td>
                <td>291</td>
                <td>409</td>
                <td>400</td>
                <td>3373</td>
                <td>Total</td>
                <td>Par</td>
                <td>Birdie</td>
                <td>HC</td>
                <td></td>
                <td></td>
            </tr>
            <tr style="background:lightyellow">
                <td>(Y)Tee</td>
                <td>374</td>
                <td>389</td>
                <td>552</td>
                <td>203</td>
                <td>547</td>
                <td>181</td>
                <td>467</td>
                <td>397</td>
                <td>417</td>
                <td>3522</td>
                <td>404</td>
                <td>553</td>
                <td>154</td>
                <td>433</td>
                <td>431</td>
                <td>196</td>
                <td>291</td>
                <td>409</td>
                <td>400</td>
                <td>3373</td>
                <td>Total</td>
                <td>Par</td>
                <td>Birdie</td>
                <td>HC</td>
                <td></td>
                <td></td>
            </tr>
            <tr style="background:red">
                <td>(Z)Tee</td>
                <td>374</td>
                <td>389</td>
                <td>552</td>
                <td>203</td>
                <td>547</td>
                <td>181</td>
                <td>467</td>
                <td>397</td>
                <td>417</td>
                <td>3522</td>
                <td>404</td>
                <td>553</td>
                <td>154</td>
                <td>433</td>
                <td>431</td>
                <td>196</td>
                <td>291</td>
                <td>409</td>
                <td>400</td>
                <td>3373</td>
                <td>Total</td>
                <td>Par</td>
                <td>Birdie</td>
                <td>HC</td>
                <td></td>
                <td></td>
            </tr>
            <tr style="background:lightblue">
                <td>Hole</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td></td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td rowspan="7"></td>
                
            </tr>

        </thead>
        <tbody>
            <tr >
                <td>HDCP</td>
                <td>9</td>
                <td>7</td>
                <td>11</td>
                <td>15</td>
                <td>13</td>
                <td>17</td>
                <td>1</td>
                <td>5</td>
                <td>1</td>
                <td></td>
                <td>8</td>
                <td>14</td>
                <td>2</td>
                <td>18</td>
                <td>4</td>
                <td>16</td>
                <td>291</td>
                <td>12</td>
                <td>6</td>
                <td>10</td>
                <td></td>
                <td>Par</td>
                <td>Birdie</td>
                <td>HC</td>
                <td></td>
                <td></td>
            </tr>
            <tr >
                <td>Par</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Par</td>
                <td>Birdie</td>
                <td>HC</td>
                <td>NET</td>
                <td>+/-</td>
            </tr>
            <tr >
                <td>Name</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>0</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>0</td>
                <td></td>
                <td></td>
                <td></td>
                <td>0</td>
                <td></td>
            </tr>
            
        </tbody>
    </table>

</body>
</html>
