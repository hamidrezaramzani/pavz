<div class="modal fade" id="specialPlace" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is" id="staticBackdropLabel">اضافه کردن مکان خاص</h5>
            </div>
            <div class="modal-body">
                <form action="" id="specialPlaceForm" class="form">

                    <input type="hidden" id="new_special_csrf" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="placename">عنوان:</label>
                        <input type="text" id="placename" name="placename" class="form-control"
                            placeholder="مثال موزه یا پمپ بنزین و ...">
                    </div>


                    <div class="form-group">
                        <label for="distance_by_walking">فاصله زمانی پیاده:(به دقیقه)</label>
                        <input type="number" id="distance_by_walking" name="distance_by_walking" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="distance_by_car">فاصله زمانی با ماشین شخصی:(به دقیقه)</label>
                        <input type="number" id="distance_by_car" name="distance_by_car" class="form-control">
                    </div>

                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-outline-primary" value="تایید">
                        <button type="button" class="btn btn-danger is close-modal" modal="#specialPlace">لغو</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
