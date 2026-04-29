<?php
$gender = strtolower($_SESSION['jenis_kelamin'] ?? 'pria');

if($gender == 'perempuan' || $gender == 'wanita' || $gender == 'p'){
    $gradient = 'from-pink-500 to-pink-600';
} else {
    $gradient = 'from-[#5478FF] to-indigo-600';
}
?>

<!-- TOP NAVBAR -->
<div class="h-16 bg-white border-b border-gray-200
            flex items-center justify-between
            fixed left-64 right-0 top-0 px-8 z-40 shadow-sm">

    <!-- LEFT -->
    <div class="flex items-center gap-4">

        <!-- Title -->
        <h1 class="text-xl font-semibold 
                   bg-gradient-to-r <?= $gradient ?>
                   bg-clip-text text-transparent tracking-wide">
            Dashboard Alumni
        </h1>

    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-4">

        <!-- USER PROFILE -->
        <div class="flex items-center gap-3
                    bg-gray-50
                    border border-gray-200
                    px-4 py-1.5 rounded-xl
                    shadow-sm hover:shadow-md
                    transition-all duration-200 cursor-pointer">

            <!-- Avatar -->
            <div class="w-9 h-9
                        bg-gradient-to-r <?= $gradient ?>
                        text-white flex items-center justify-center
                        rounded-full font-semibold text-sm">

                <?= strtoupper(substr($_SESSION['fullname'],0,1)) ?>

            </div>

            <!-- Name -->
            <div class="hidden md:block leading-tight">

                <div class="text-sm font-semibold text-gray-800">
                    <?= htmlspecialchars($_SESSION['fullname']) ?>
                </div>

                <div class="text-xs text-gray-500">
                    Alumni
                </div>

            </div>

            <!-- Icon -->
            <i class='bx bx-chevron-down text-gray-500 text-lg'></i>

        </div>

    </div>

</div>