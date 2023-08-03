@if($categories->count())
    <div class="swal2-container swal2-center" style="display: none;background: rgba(141,141,141,0.23)" id="Formupdate">
        <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
             class="swal2-popup swal2-modal  swal2-show p-0 w-lg-50" tabindex="-1" style="display: flex">

            <div class="card">
                <div class="card-header fs-2">
                    <span class="font-size-h3 fw-bolder">
                        Modification de la catégorie :
                        <span class="text-muted namecateUpd"></span>
                    </span>
                    <span class="close cursor-pointer"> &times; </span>
                </div>

                <div class="card-body">
                    <form action="" id="formrenamcate" method="POST">
                        @csrf
                        <input type="text" name="name_webformulaire" class="form-control" title="" />

                        <div class="card-footer">
                            <input type="submit" value="Modifier" name="gestionAdd"
                                   class="float-right btn btn-light-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endif
