<div class="search-box my-0 my-md-4">
    <form action="">
        <div class="input-g">
            <i class="fa fa-flag"></i>
            <input type="text" name="location-name" id="location-name" placeholder="کجا میخوای بری؟" />
            <div class="locations">
                <ul></ul>                                    
            </div>
        </div>        
        <div class="styled-select">
            <i class="fa fa-building"></i>
            <select name="type" id="type-input" property="voucherCategoryClass">
                <option value="0">دنبال چی هستی؟</option>
                <option value="1" data-for="Villa">اجاره ویلا و سوئیت</option>
                <option value="2" data-for="Villa">خرید ویلا و سوئیت</option>    
                <option value="1" data-for="Apartment">خرید آپارتمان</option>
                <option value="2" data-for="Apartment">اجاره آپارتمان</option>
                <option value="1" data-for="Area">خرید زمین</option>
                <option value="1" data-for="Shop">خرید مغازه</option>
                <option value="2"  data-for="Shop">اجاره مغازه</option>
            </select>
        </div>
        <button id="btn-search" type="button">
            <span class="d-inline d-md-none">جستجو</span> <i class="fa fa-search"></i>
        </button>
    </form>
</div>
