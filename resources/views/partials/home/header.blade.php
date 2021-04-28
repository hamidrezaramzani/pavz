<div class="section welcome" id="header">
    <div class="header-effect"></div>
    @include('partials.home.welcome-box')
    @include('partials.gototop')
    <div class="modal fade" id="findByIdModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="findByIdLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title is" id="findByIdLabel">رزرو ویلا چگونه انجام میگیرد؟</h5>
            </div>
            <div class="modal-body">
             
                <form action="" class="form">
                    <div class="form-group w-100 d-block">
                        <label for="id-item">شناسه آگهی:</label>
                        <input type="number" name="id-item" id="id-item" class="form-control"
                            placeholder="شناسه آگهی را وارد نمایید">
                    </div>


                    <div class="form-group">
                        <label for="type">آگهی:</label>
                        <select name="type" id="type" name="type" class="form-control">
                            <option value="1">سوییت یا ویلا</option>                                        
                            <option value="2">آپارتمان</option>                                        
                            <option value="3">زمین</option>                                        
                            <option value="4">مغازه</option>                                        
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-sm btn-primary is" id="find-by-id-btn">
                        جستجو
                        <div id="find-loading" class="spinner-border spinner-border-sm" role="status" >
                            <span class="sr-only">Loading...</span>
                        </div>
        
                    </button>
            
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary is" data-bs-dismiss="modal">برگشت</button>
            </div>
        </div>
    </div>
</div>

</div>
