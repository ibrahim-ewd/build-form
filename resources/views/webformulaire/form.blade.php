<div class="swal2-container swal2-center " style="display: none;background: rgba(141,141,141,0.23)" id="myModal">
    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
         class="swal2-popup swal2-modal  swal2-show p-0 w-lg-50" tabindex="-1" style="display: flex" >

        <div class="card">
            <div class="card-header fs-2">

                <sapn class="font-size-h3 fw-bolder"> Créer un nouveau formulaire</sapn>

                <span class="close" style="cursor: pointer">&times;</span>
            </div>
            <div class="card-body">

                <form action="{{route('form_store')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$clients_id}}" name="clients_id" >
                    <div class="form-group">
                        <label>Titre</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Catégories</label>
                        <div class="input-group">
                            <select class="form-control" name="categories" >

                                @foreach($cate as $cat)
                                    <option value="{{$cat->id}}">
                                        {{$cat->name}}  @if($cat->index_>0) ({{$cat->index_}}) @endif
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Détail</label>
                        <div class="input-group">
                            <textarea type="text" name="detail" class="form-control" aria-label="Text input with checkbox"></textarea>
                        </div>
                    </div>








                    <div class="card-footer">

                        <input type="submit" value="Créer" name="gestionAdd"  class="float-right btn btn-light-primary">

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
