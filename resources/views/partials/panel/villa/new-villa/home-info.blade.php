<section>
    
    <form action="" method="POST" class="form" id="specification-form">
        <h3>اطلاعات مربوط به ملک</h3>

        <div class="form-group">
            <label for="floors">تعداد طبقات:</label>
            <input type="number" name="floors" id="floors" class="form-control" placeholder="5">
        </div>


        <div class="form-group">
            <label for="unite">تعداد واحد هر طبقه:</label>
            <input type="number" name="unite" id="unite" class="form-control" placeholder="5">
        </div>


        <div class="form-group">
            <label for="foundationArea">متراژ کل زمین:</label>
            <input type="number" name="foundationArea" id="foundationArea" class="form-control" placeholder="متر مربع">
        </div>

        <div class="form-group">
            <label for="foundationHome">متراژ ملک:</label>
            <input type="number" name="foundationHome" id="foundationHome" class="form-control" placeholder="متر مربع">
        </div>



        <div class="form-group">
            <label for="yearOfConstuction">سال ساخت(اختیاری):</label>
            <input type="number" name="yearOfConstuction" id="yearOfConstuction" class="form-control"
                placeholder="مثلا 1385">
        </div>

        <div class="form-group">
            <label for="ownership">نوع مالکیت:</label>
            <select name="ownership" id="ownership" name="ownership" class="form-control">
                <option value="1">دربست(تمام فضا های آن به طور کامل به مهمان تعلق خواهد گرفت)</option>
                <option value="2">غیر دربست(تعدای از فضاهای آن با دیگران مشترک است)</option>
            </select>
        </div>


        <div class="form-group">
            <label for="structuretype">تیپ سازه:</label>
            <select name="structuretype" id="structuretype" name="structuretype" class="form-control">
                <option value="1">هم سطح</option>
                <option value="2">دوبلکس</option>
                <option value="3">تریپلکس</option>
            </select>
        </div>
        

        <br>
        <br>
        
        <h3>اطلاعات مربوط به محیط</h3>

        <div class="form-group">
            <label for="roadtype">مسیر دسترسی:</label>
            <select name="roadtype" id="roadtype" name="roadtype" class="form-control">
                <option value="0">آسفالت</option>
                <option value="1">خاکی</option>
                <option value="2">مال رو</option>
            </select>
        </div>


        <div class="form-group">
            <label for="neighbor">همسایگی ملک:</label>
            <select name="neighbor" id="neighbor" name="neighbor" class="form-control">
                <option value="0">همسایه وجود ندارد</option>
                <option value="1">دیوار به دیوار</option>
                <option value="2">پراکنده</option>
            </select>
        </div>





        <div class="form-group">
            <label for="neighbor">
                مکان های خاص:(اختیاری)
                <a href="" class="float-left" id="add-special-place">اضافه کردن مکان خاص</a>
            </label>
            <ul id="special-places">
                <li>
                    <p>مکانی اضافه نکرده اید</p>    
                </li>    
            </ul>            
        </div>

        <div class="form-group">
            <label for="abouthome">درباره ملک(اختیاری):</label>
            <textarea name="abouthome" id="abouthome" class="form-control"
                placeholder="توضیحات بیشتر در مورد اقامتگاه"></textarea>
        </div>

        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-sm btn-primary is">ادامه</button>
        </div>

    </form>


</section>


    
<div class="modal fade" id="specialPlace" data-bs-backdrop="static" data-bs-keyboard="false"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title is" id="staticBackdropLabel">اضافه کردن مکان خاص</h5>
        </div>
        <div class="modal-body">
            <form action="" id="specialPlaceForm" class="form">

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
                    <button type="button" id="leave_from_modal" class="btn btn-danger is">لغو</button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>


