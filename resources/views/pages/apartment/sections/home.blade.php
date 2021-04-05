
                <div class="villa-info-item info-table float-right w-100">
                    <h2>
                        <i class="fa fa-circle fa-xs text-warning"></i>
                        اطلاعات مربوط به ملک
                    </h2>
                    <br>

                    <table class="table text-center is w-50 float-right">
                        <tbody>
                            <tr>
                                <td>نوع کاربری:</td>
                                <td>{{$data->accountType->name}}</td>
                            </tr>

                            <tr>
                                <td>نوع ملک:</td>
                                <td>{{$data->apartmentType->name}}</td>
                            </tr>

                            <tr>
                                <td>تعداد طبقه:</td>
                                <td>{{$data->floors}}</td>
                            </tr>



                            <tr>
                                <td>تعداد واحد در هر طبقه:</td>
                                <td>{{$data->unites}}</td>
                            </tr>


                        </tbody>
                    </table>


                    <table class="table text-center is w-50 float-right">
                        <tbody>




                            <tr>
                                <td>سال ساخت:</td>
                                <td>{{$data->year_of_construction}}</td>
                            </tr>


                            <tr>
                                <td>متراژ:</td>
                                <td>{{$data->foundation}} متر</td>
                            </tr>




                            @if ($data->document_type)
                            <tr>
                                <td>نوع سند:</td>
                                <td>{{$data->document->name}}</td>
                            </tr>    
                            @endif
                            
                        </tbody>
                    </table>
                </div>

                <br>
                <br>