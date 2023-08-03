<div class="swal2-container swal2-center " style="display: none;background: rgba(141,141,141,0.23)" id="myModal">
    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
         class="swal2-popup swal2-modal  swal2-show p-0 w-lg-50" tabindex="-1" style="display: flex">

        <div class="card">
            <div class="card-header fs-2">
                <span class="font-size-h3 fw-bolder"> Créer un  nouvelle catégorie </span>
                <span class="close cursor-pointer"> &times; </span>
            </div>

            <div class="card-body">
                <form action="{{route('category.store')}}" method="POST">
                    @csrf

                    <input type="text" placeholder="Titre de la catégorie" name="name_webform" required
                           class="form-control" title="Titre de la catégorie">

                    <div class="card-footer">
{{--                        <button class="btn" data-dismiss="modal" aria-hidden="true">Non</button>--}}
                        <input type="submit" value="Créer" name="gestionAdd"
                               class="float-right btn btn-light-primary">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
