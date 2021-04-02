
                <div class="villa-info-item my-4 float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        مقررات ویلا
                    </h2>

                    <br>


                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        مقررات زمانی ملک
                    </div>

                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>ساعت تحویل:</td>
                                <td>{{ $data->rules->delivery_time }}</td>
                            </tr>

                            <tr>
                                <td>ساعت تخلیه:</td>
                                <td>{{ $data->rules->discharge_time }}</td>
                            </tr>


                        </tbody>
                    </table>


                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>

                            <tr>
                                <td>حداقل اقامت:</td>
                                <td>{{ $data->rules->min_stay }} روز</td>
                            </tr>

                            <tr>
                                <td>توضیحات بیشتر:</td>
                                <td>ندارد</td>
                            </tr>
                        </tbody>

                    </table>


                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        توضیحات بیشتر درباره مقررات زمانی اقامتگاه
                    </div>

                    <p>{{$data->rules->more_time_rules_description}}</p>

                    <br>
                
                    <div class="accordion-title mb-3 float-right w-100">
                        <i class="fa fa-arrow-down"></i>
                        دیگر مقررات اقامتگاه
                    </div>

                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>آوردن حیوان خانگی:</td>
                                <td>
                                    @switch($data->rules->animal)
                                @case(0)
                                مجاز نیست
                                                            
                                @break
                                @case(1)
                                مجاز است                            
                                @break
                                @default
                                در بیرون ملک
                            @endswitch
                                </td>
                            </tr>

                            <tr>
                                <td>استعمال دخانیات:</td>
                                <td>
                                    @switch($data->rules->animal)
                                        @case(0)
                                        مجاز نیست
                                                                    
                                        @break
                                        @case(1)
                                        مجاز است                            
                                        @break
                                        @default
                                        در بیرون ملک
                                    @endswitch
                                </td>
                            </tr>


                        </tbody>
                    </table>


                    <table class="table info-table mt-3 text-center is w-50 float-right">
                        <tbody>

                            <tr>
                                <td>برگذاری جشن:</td>
                                <td>
                                    @switch($data->rules->animal)
                                        @case(0)
                                        مجاز نیست
                                                                    
                                        @break
                                        @case(1)
                                        مجاز است                            
                                        @break
                                        @default
                                        با هماهنگی صاحبخانه
                                    @endswitch
                                    
                                </td>
                            </tr>

                        </tbody>

                    </table>

                    @if ($data->rules->more_rules_description)
                        
                        <div class="accordion-title mb-3 float-right w-100">
                            <i class="fa fa-arrow-down"></i>
                            توضیحات بیشتر درباره مقررات  اقامتگاه
                        </div>

                        <p>{{$data->rules->more_rules_description}}</p>

                        <br>

                    @endif

                </div>





                <br>
                <br>