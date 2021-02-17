<div class="" >
    <div class="container text-white ">
        <div class="d-flex align-items-center">
            <div class="mr-3">
                <!-- <h1 class="mb-3"><?php echo $label ?></h1> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a  href="<?php echo HTTP_HOST ?>">Inicio</a></li>
                        <li class="breadcrumb-item"><a  href="<?php echo HTTP_HOST . '' . $paginas[0]['ruta'] ?>"><?php echo $paginas[0]['label'] ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><strong><?php echo $label ?> </strong></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>