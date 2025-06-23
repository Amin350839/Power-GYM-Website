<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedules - POWER_GYM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        body {
            background-color: #111;
            color: white;
        }
        main {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .text-gray-400 {
            color: #999;
        }
        .text-4xl {
            font-size: 2.25rem;
        }
        .font-bold {
            font-weight: bold;
        }
        .mt-2 {
            margin-top: 0.5rem;
        }
        .mt-10 {
            margin-top: 2.5rem;
        }
        .text-center {
            text-align: center;
        }
        .overflow-x-auto {
            overflow-x: auto;
        }

        /* Table Styles */
        .schedule-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: #222;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .schedule-table th, .schedule-table td {
            padding: 15px;
            text-align: center;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .schedule-table th {
            background: linear-gradient(180deg, #ff4757, #e63946);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .schedule-table td {
            background-color: #222;
            color: #fff;
            border-bottom: 1px solid #333;
        }
        .schedule-table td.time-slot {
            background: linear-gradient(180deg, #444, #333);
            font-weight: 500;
            color: #ff4757;
        }
        .schedule-table td:not(.time-slot):hover {
            background-color: #333;
            cursor: pointer;
        }
        .schedule-table .text-gray-400 {
            font-size: 12px;
            display: block;
            margin-top: 5px;
        }
        .schedule-table tr:last-child td {
            border-bottom: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .schedule-table {
                font-size: 12px;
            }
            .schedule-table th, .schedule-table td {
                padding: 10px;
            }
            .schedule-table .text-gray-400 {
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <div class="text-center">
            <p class="text-gray-400">Our Weekly Gym Schedules</p>
            <h1 class="text-4xl font-bold mt-2">Workout Timetable</h1>
        </div>
        <div class="mt-10 overflow-x-auto">
            <table class="schedule-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>MON</th>
                        <th>TUE</th>
                        <th>WED</th>
                        <th>THU</th>
                        <th>FRI</th>
                        <th>SAT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time-slot">7:00 AM</td>
                        <td>Cardio<br><span class="text-gray-400">7:00 AM - 9:00 AM</span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="time-slot">9:00 AM</td>
                        <td></td>
                        <td></td>
                        <td>Boxing<br><span class="text-gray-400">8:00 AM - 9:00 AM</span></td>
                        <td></td>
                        <td></td>
                        <td>Cardio<br><span class="text-gray-400">8:00 AM - 9:00 AM</span></td>
                    </tr>
                    <tr>
                        <td class="time-slot">11:00 AM</td>
                        <td></td>
                        <td>Boxing<br><span class="text-gray-400">11:00 AM - 2:00 PM</span></td>
                        <td></td>
                        <td></td>
                        <td>Body work<br><span class="text-gray-400">11:50 AM - 5:20 PM</span></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="time-slot">2:00 PM</td>
                        <td>Boxing<br><span class="text-gray-400">2:00 PM - 4:00 PM</span></td>
                        <td></td>
                        <td></td>
                        <td>Cardio<br><span class="text-gray-400">6:00 PM - 9:00 PM</span></td>
                        <td></td>
                        <td>Cardio<br><span class="text-gray-400">5:00 PM - 7:00 PM</span></td>
                    </tr>
                    <tr>
                        <td class="time-slot">4:00 PM</td>
                        <td></td>
                        <td>Jujitsu<br><span class="text-gray-400">4:00 PM - 6:00 PM</span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="time-slot">6:00 PM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Judo<br><span class="text-gray-400">6:00 PM - 8:00 PM</span></td>
                        <td>Judo<br><span class="text-gray-400">6:00 PM - 8:00 PM</span></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="time-slot">8:00 PM</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Judo<br><span class="text-gray-400">8:00 PM - 10:00 PM</span></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>