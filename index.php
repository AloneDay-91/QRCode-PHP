<!DOCTYPE html>
<html class="scroll-smooth">
<head>
    <title>Générateur de QR code</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>
<body class="dark:bg-[#010101] text-center">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <div class="text-center shadow shadow-white flex flex-col justify-center items-center h-screen">
        <h1 class="dark:text-[#ffcc3d] m-5 text-3xl">Générateur de QR code</h1>
        <form class=text-center flex flex-col justify-center items-center" action="" method="post">
        <input class="rounded-full w-full focus:ring-2 focus:ring-[#FFCC3D]" type="text" name="data" id="data" placeholder="Lien">
        <br>
        <input class="font-medium border-2 border-[#FFCC3D] m-3 p-2 rounded dark:text-white hover:bg-[#FFCC3D] hover:dark:text-gray-800 hover:font-medium hover:cursor-pointer" type="submit" value="Générer">
        </form>
        <?php
        require_once 'phpqrcode/qrlib.php';
        $qr_file = "qrcode.png";
        if (isset($_POST['data'])) {
            $data = $_POST['data'];

            // Générer le QR code
            QRcode::png($data, $qr_file);

            echo '
                <div id="toast-default" class="flex items-center w-full items-end max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed top-5 right-5" role="alert">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ml-3 text-sm font-normal">QRCode Générer !</div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-default" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
              ';

            // Afficher le QR code
            echo '<img src="'.$qr_file.'">';
            echo '<a class="dark:text-[#FFCC3D]" href="'.$data.'">'.$data.'</a>';

            echo '<br><a class="font-medium border-2 border-[#FFCC3D] m-3 p-2 rounded dark:text-white hover:bg-[#FFCC3D] hover:dark:text-gray-800 hover:font-medium hover:cursor-pointer" href="'.$qr_file.'" download>Télécharger le QR code</a>';
        }
        ?>
    </div>
</body>
</html>

<!-- COULEURS
JAUNE: #FFCC3D
BLEU: #959DFF
VIOLET BLEU: #916AFF
NOIR: #010101
 -->