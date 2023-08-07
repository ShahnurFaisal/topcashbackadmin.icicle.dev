@extends('backend.layouts.app')
@section('title')
Site Info
@endsection


@section('content')

<!-- Hoverable Table rows -->
<div class="container customer-container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-head m-3 customer-card">
                    <h3>Company Setting Information</h3>
                    <div class="search">
                        <i class="fa fa-info-circle me-2 btn btn-primary"></i>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="name"><strong>Option Name</strong></label>
                                    <input type="text" id="option_name" name="company_name" value="{{ get_static_option('company_name') }}" placeholder="Company Name" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="email"><strong>Option Value</strong></label>
                                    <input type="text" id="option_value" name="email" value="{{ get_static_option('email') }}" placeholder="Company Email" class="form-control">
                                </div>
                                {{-- <div class="form-group mt-3">
                                    <label for="email"><strong>Mobile</strong></label>
                                    <input type="tel" id="mobile_number" name="mobile_number" placeholder="Mobile number will be here" class="form-control">
                                </div> --}}
                                <div class="form-group mt-3">
                                    <label for="image"><strong>Logo</strong></label>
                                    <input type="file" class="form-control my-2" name="logo" id="image" />
                                    <img id="showImage" src="{{asset(get_static_option('logo'))}}" alt="" value="{{ get_static_option('logo') }}" class="image-style mb-3">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="email"><strong>Short Description</strong></label>
                                    <textarea name="short_description" placeholder="Enter a short description" class="form-control">{{ get_static_option('short_description') }}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="name"><strong>Service Charge(%)</strong></label>
                                    <input type="text" id="service_charge" name="service_charge" placeholder="Service Charge will be here..." value="{{ get_static_option('service_charge') }}" class="form-control">
                                </div>
                                <input type="submit" value="Submit" class="btn btn-success my-3" >
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name"><strong>Service Charge(%)</strong></label>
                                    <input type="text" id="service_charge" name="service_charge" placeholder="Service Charge will be here..." class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Business Start Date</strong></label>
                                    <input type="date" name="business_start_date" class="form-control" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Balance Sheet Type</strong></label>
                                    <select name="balance_sheet" class="form-control">
                                        <option>6 Months</option>
                                        <option>12 Months</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Currency Symbol Placement</strong></label>
                                    <select name="currency_symbol" class="form-control">
                                        <option>Before Amount</option>
                                        <option>After Amount</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Country</strong></label>
                                    <select name="country" class="form-control">
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                        <option>American Samoa</option>
                                        <option>Andorra</option>
                                        <option>Angola</option>
                                        <option>Anguilla</option>
                                        <option>Antigua and Barbuda</option>
                                        <option>Argentina</option>
                                        <option>Armenia</option>
                                        <option>Aruba</option>
                                        <option>Australia</option>
                                        <option>Austria</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahamas</option>
                                        <option>Bahrain</option>
                                        <option>Bangladesh</option>
                                        <option>Barbados</option>
                                        <option>Belarus</option>
                                        <option>Belgium</option>
                                        <option>Belize</option>
                                        <option>Benin</option>
                                        <option>Bermuda</option>
                                        <option>Bhutan</option>
                                        <option>Bolivia</option>
                                        <option>Bosnia and Herzegovina</option>
                                        <option>Botswana</option>
                                        <option>Brazil</option>
                                        <option>Brunei Darussalam</option>
                                        <option>Bulgaria</option>
                                        <option>Burkina Faso</option>
                                        <option>Burundi</option>
                                        <option>Cambodia</option>
                                        <option>Cameroon</option>
                                        <option>Canada</option>
                                        <option>Cape Verde</option>
                                        <option>Cayman Islands</option>
                                        <option>Central African Republic</option>
                                        <option>Chad</option>
                                        <option>Chile</option>
                                        <option>China</option>
                                        <option>Christmas Island</option>
                                        <option>Cocos (Keeling) Islands</option>
                                        <option>Colombia</option>
                                        <option>Comoros</option>
                                        <option>Democratic Republic of the Congo</option>
                                        <option>Congo, Republic of (Brazzaville)</option>
                                        <option>Cook Islands</option>
                                        <option>Costa Rica</option>
                                        <option>Côte D'ivoire</option>
                                        <option>Croatia</option>
                                        <option>Cuba</option>
                                        <option>Cyprus</option>
                                        <option>Czech Republic</option>
                                        <option>Denmark</option>
                                        <option>Djibouti</option>
                                        <option>Dominica</option>
                                        <option>Dominican Republic</option>
                                        <option>East Timor (Timor-Leste)</option>
                                        <option>Ecuador</option>
                                        <option>Egypt</option>
                                        <option>El Salvador</option>
                                        <option>Equatorial Guinea</option>
                                        <option>Eritrea</option>
                                        <option>Estonia</option>
                                        <option>Ethiopia</option>
                                        <option>Falkland Islands</option>
                                        <option>Faroe Islands</option>
                                        <option>Fiji</option>
                                        <option>Finland</option>
                                        <option>France</option>
                                        <option>French Guiana</option>
                                        <option>French Polynesia</option>
                                        <option>French Southern Territories</option>
                                        <option>Gabon</option>
                                        <option>The Gambia</option>
                                        <option>Georgia</option>
                                        <option>Germany</option>
                                        <option>Ghana</option>
                                        <option>Gibraltar</option>
                                        <option>Greece</option>
                                        <option>Greenland</option>
                                        <option>Grenada</option>
                                        <option>Guadeloupe</option>
                                        <option>Guam</option>
                                        <option>Guatemala</option>
                                        <option>Guinea</option>
                                        <option>Guinea-Bissau</option>
                                        <option>Guyana</option>
                                        <option>Haiti</option>
                                        <option>Holy See</option>
                                        <option>Honduras</option>
                                        <option>Hong Kong</option>
                                        <option>Hungary</option>
                                        <option>Iceland</option>
                                        <option>India</option>
                                        <option>Indonesia</option>
                                        <option>Iran</option>
                                        <option>Iraq</option>
                                        <option>Ireland</option>
                                        <option>Italy</option>
                                        <option>Ivory Coast</option>
                                        <option>Jamaica</option>
                                        <option>Japan</option>
                                        <option>Jordan</option>
                                        <option>Kazakhstan</option>
                                        <option>Kenya</option>
                                        <option>Kiribati</option>
                                        <option>Korea, Democratic People's Rep. (North Korea)</option>
                                        <option>Korea, Republic of (South Korea)</option>
                                        <option>Kosovo</option>
                                        <option>Kuwait</option>
                                        <option>Kyrgyzstan</option>
                                        <option>Lao, People's Democratic Republic</option>
                                        <option>Latvia</option>
                                        <option>Lebanon</option>
                                        <option>Lesotho</option>
                                        <option>Liberia</option>
                                        <option>Libya</option>
                                        <option>Liechtenstein</option>
                                        <option>Lithuania</option>
                                        <option>Luxembourg</option>
                                        <option>Macau</option>
                                        <option>Madagascar</option>
                                        <option>Malawi</option>
                                        <option>Malaysia</option>
                                        <option>Maldives</option>
                                        <option>Mali</option>
                                        <option>Malta</option>
                                        <option>Marshall Islands</option>
                                        <option>Martinique</option>
                                        <option>Mauritania</option>
                                        <option>Mauritius</option>
                                        <option>Mayotte</option>
                                        <option>Mexico</option>
                                        <option>Micronesia, Federal States of</option>
                                        <option>Moldova, Republic of</option>
                                        <option>Monaco</option>
                                        <option>Mongolia</option>
                                        <option>Montenegro</option>
                                        <option>Montserrat</option>
                                        <option>Morocco</option>
                                        <option>Mozambique</option>
                                        <option>Myanmar</option>
                                        <option>Namibia</option>
                                        <option>Nauru</option>
                                        <option>Nepal</option>
                                        <option>Netherlands</option>
                                        <option>Netherlands Antilles</option>
                                        <option>New Caledonia</option>
                                        <option>New Zealand</option>
                                        <option>Nicaragua</option>
                                        <option>Niger</option>
                                        <option>Nigeria</option>
                                        <option>Niue</option>
                                        <option>North Macedonia</option>
                                        <option>Northern Mariana Islands</option>
                                        <option>Norway</option>
                                        <option>Oman</option>
                                        <option>Pakistan</option>
                                        <option>Palau</option>
                                        <option>Palestinian territories</option>
                                        <option>Panama</option>
                                        <option>Papua New Guinea</option>
                                        <option>Paraguay</option>
                                        <option>Peru</option>
                                        <option>Philippines</option>
                                        <option>Pitcairn Island</option>
                                        <option>Poland</option>
                                        <option>Portugal</option>
                                        <option>Puerto Rico</option>
                                        <option>Qatar</option>
                                        <option>Reunion Island</option>
                                        <option>Romania</option>
                                        <option>Russian Federation</option>
                                        <option>Rwanda</option>
                                        <option>Saint Kitts and Nevis</option>
                                        <option>Saint Lucia</option>
                                        <option>Saint Vincent and the Grenadines</option>
                                        <option>Samoa</option>
                                        <option>San Marino</option>
                                        <option>Sao Tome and Principe</option>
                                        <option>Saudi Arabia</option>
                                        <option>Senegal</option>
                                        <option>Serbia</option>
                                        <option>Seychelles</option>
                                        <option>Sierra Leone</option>
                                        <option>Singapore</option>
                                        <option>Slovakia (Slovak Republic)</option>
                                        <option>Slovenia</option>
                                        <option>Solomon Islands</option>
                                        <option>Somalia</option>
                                        <option>South Africa</option>
                                        <option>South Sudan</option>
                                        <option>Spain</option>
                                        <option>Sri Lanka</option>
                                        <option>Sudan</option>
                                        <option>Suriname</option>
                                        <option>Swaziland (Eswatini)</option>
                                        <option>Sweden</option>
                                        <option>Switzerland</option>
                                        <option>Syria, Syrian Arab Republic</option>
                                        <option>Taiwan</option>
                                        <option>Tajikistan</option>
                                        <option>Tanzania</option>
                                        <option>Thailand</option>
                                        <option>Tibet</option>
                                        <option>Timor-Leste (East Timor)</option>
                                        <option>Togo</option>
                                        <option>Tokelau</option>
                                        <option>Tonga</option>
                                        <option>Trinidad and Tobago</option>
                                        <option>Tunisia</option>
                                        <option>Turkey</option>
                                        <option>Turkmenistan</option>
                                        <option>Turks and Caicos Islands</option>
                                        <option>Tuvalu</option>
                                        <option>Uganda</option>
                                        <option>Ukraine</option>
                                        <option>United Arab Emirates</option>
                                        <option>United Kingdom</option>
                                        <option>United States</option>
                                        <option>Uruguay</option>
                                        <option>Uzbekistan</option>
                                        <option>Vanuatu</option>
                                        <option>Vatican City State (Holy See)</option>
                                        <option>Venezuela</option>
                                        <option>Vietnam</option>
                                        <option>Virgin Islands (British)</option>
                                        <option>Virgin Islands (U.S.)</option>
                                        <option>Wallis and Futuna Islands</option>
                                        <option>Western Sahara</option>
                                        <option>Yemen</option>
                                        <option>Zambia</option>
                                        <option>Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Default Currency</strong></label>
                                    <select name="country" class="form-control">
                                        <option>AFN</option>
                                        <option>ARS</option>
                                        <option>AWG</option>
                                        <option>AUD</option>
                                        <option>AZN</option>
                                        <option>BSD</option>
                                        <option>BBD</option>
                                        <option>BDT</option>
                                        <option>BYR</option>
                                        <option>BZD</option>
                                        <option>BMD</option>
                                        <option>BOB</option>
                                        <option>BAM</option>
                                        <option>BWP</option>
                                        <option>BGN</option>
                                        <option>BRL</option>
                                        <option>BND</option>
                                        <option>KHR</option>
                                        <option>CAD</option>
                                        <option>KYD</option>
                                        <option>CLP</option>
                                        <option>CNY</option>
                                        <option>COP</option>
                                        <option>CRC</option>
                                        <option>HRK</option>
                                        <option>CUP</option>
                                        <option>CZK</option>
                                        <option>DKK</option>
                                        <option>DOP</option>
                                        <option>XCD</option>
                                        <option>EGP</option>
                                        <option>SVC</option>
                                        <option>EEK</option>
                                        <option>EUR</option>
                                        <option>FKP</option>
                                        <option>FJD</option>
                                        <option>GHC</option>
                                        <option>GIP</option>
                                        <option>GTQ</option>
                                        <option>GGP</option>
                                        <option>GYD</option>
                                        <option>HNL</option>
                                        <option>HKD</option>
                                        <option>HUF</option>
                                        <option>ISK</option>
                                        <option>INR</option>
                                        <option>IDR</option>
                                        <option>IRR</option>
                                        <option>IMP</option>
                                        <option>ILS</option>
                                        <option>JMD</option>
                                        <option>JPY</option>
                                        <option>JEP</option>
                                        <option>KZT</option>
                                        <option>KPW</option>
                                        <option>KRW</option>
                                        <option>KGS</option>
                                        <option>LAK</option>
                                        <option>LVL</option>
                                        <option>LBP</option>
                                        <option>LRD</option>
                                        <option>LTL</option>
                                        <option>MKD</option>
                                        <option>MYR</option>
                                        <option>MUR</option>
                                        <option>MXN</option>
                                        <option>MNT</option>
                                        <option>MZN</option>
                                        <option>NAD</option>
                                        <option>NPR</option>
                                        <option>ANG</option>
                                        <option>NZD</option>
                                        <option>NIO</option>
                                        <option>NGN</option>
                                        <option>NOK</option>
                                        <option>OMR</option>
                                        <option>PKR</option>
                                        <option>PAB</option>
                                        <option>PYG</option>
                                        <option>PEN</option>
                                        <option>PHP</option>
                                        <option>PLN</option>
                                        <option>QAR</option>
                                        <option>RON</option>
                                        <option>RUB</option>
                                        <option>SHP</option>
                                        <option>SAR</option>
                                        <option>RSD</option>
                                        <option>SCR</option>
                                        <option>SGD</option>
                                        <option>SBD</option>
                                        <option>SOS</option>
                                        <option>ZAR</option>
                                        <option>LKR</option>
                                        <option>SEK</option>
                                        <option>CHF</option>
                                        <option>SRD</option>
                                        <option>SYP</option>
                                        <option>TWD</option>
                                        <option>THB</option>
                                        <option>TTD</option>
                                        <option>TRY</option>
                                        <option>TRL</option>
                                        <option>TVD</option>
                                        <option>UAH</option>
                                        <option>GBP</option>
                                        <option>USD</option>
                                        <option>UYU</option>
                                        <option>UZS</option>
                                        <option>VEF</option>
                                        <option>VND</option>
                                        <option>YER</option>
                                        <option>ZWD</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Timezone</strong></label>
                                    <select name="country" class="form-control">
                                        <option>(UTC-11:00)Pacific/Midway</option>
                                        <option>(UTC-11:00)Pacific/Niue</option>
                                        <option>(UTC-10:00)Pacific/Honolulu</option>
                                        <option>(UTC-11:00)Pacific/Rarotonga</option>
                                        <option>(UTC-11:00)Pacific/Tahiti</option>
                                        <option>(UTC-09:30)Pacific/Marquesas</option>
                                        <option>(UTC-09:00)America/Adak</option>
                                        <option>(UTC-09:00)Pacific/Gambier</option>
                                        <option>(UTC-08:00)America/Anchorage</option>
                                        <option>(UTC-08:00)America/Juneau</option>
                                        <option>(UTC-08:00)America/Metlakatla</option>
                                        <option>(UTC-08:00)America/Nome</option>
                                        <option>(UTC-08:00)America/Sitka</option>
                                        <option>(UTC-08:00)America/Yakutat</option>
                                        <option>(UTC-08:00)Pacific/Pitcairn</option>
                                        <option>(UTC-07:00)America/Creston</option>
                                        <option>(UTC-07:00)America/Dawson</option>
                                        <option>(UTC-07:00)America/Dawson_Creek</option>
                                        <option>(UTC-07:00)America/Fort_Nelson</option>
                                        <option>(UTC-07:00)America/Hermosillo</option>
                                        <option>(UTC-07:00)America/Los_Angeles</option>
                                        <option>(UTC-07:00)America/Phoenix</option>
                                        <option>(UTC-07:00)America/Tijuana</option>
                                        <option>(UTC-07:00)America/Vancouver</option>
                                        <option>(UTC-07:00)America/Whitehorse</option>
                                        <option>(UTC-06:00)America/Belize</option>
                                        <option>(UTC-06:00)America/Cambridge_Bay</option>
                                        <option>(UTC-06:00)America/Chihuahua</option>
                                        <option>(UTC-06:00)America/Costa_Rica</option>
                                        <option>(UTC-06:00)America/Denver</option>
                                        <option>(UTC-06:00)America/Edmonton</option>
                                        <option>(UTC-06:00)America/El_Salvador</option>
                                        <option>(UTC-06:00)America/Guatemala</option>
                                        <option>(UTC-06:00)America/Inuvik</option>
                                        <option>(UTC-06:00)America/Mazatlan</option>
                                        <option>(UTC-06:00)America/Ojinaga</option>
                                        <option>(UTC-06:00)America/Regina</option>
                                        <option>(UTC-06:00)America/Swift_Current</option>
                                        <option>(UTC-06:00)America/Tegucigalpa</option>
                                        <option>(UTC-06:00)America/Yellowknife</option>
                                        <option>(UTC-06:00)Pacific/Easter</option>
                                        <option>(UTC-06:00)Pacific/Galapagos</option>
                                        <option>(UTC-05:00)America/Atikokan</option>
                                        <option>(UTC-05:00)America/Bahia_Banderas</option>
                                        <option>(UTC-05:00)America/Bogota</option>
                                        <option>(UTC-05:00)America/Cancun</option>
                                        <option>(UTC-05:00)America/Cayman</option>
                                        <option>(UTC-05:00)America/Chicago</option>
                                        <option>(UTC-05:00)America/Eirunepe</option>
                                        <option>(UTC-05:00)America/Guayaquil</option>
                                        <option>(UTC-05:00)America/Indiana/Knox</option>
                                        <option>(UTC-05:00)America/Indiana/Tell_City</option>
                                        <option>(UTC-05:00)America/Jamaica</option>
                                        <option>(UTC-05:00)America/Lima</option>
                                        <option>(UTC-05:00)America/Matamoros</option>
                                        <option>(UTC-05:00)America/Menominee</option>
                                        <option>(UTC-05:00)America/Merida</option>
                                        <option>(UTC-05:00)America/Mexico_City</option>
                                        <option>(UTC-05:00)America/Monterry</option>
                                        <option>(UTC-05:00)America/North_Dakota/Beulah</option>
                                        <option>(UTC-05:00)America/North_Dakota/Center</option>
                                        <option>(UTC-05:00)America/North_Dakota/New_Salem</option>
                                        <option>(UTC-05:00)America/Panama</option>
                                        <option>(UTC-05:00)America/Rainy_River</option>
                                        <option>(UTC-05:00)America/Rankin_Inlet</option>
                                        <option>(UTC-05:00)America/Resolute</option>
                                        <option>(UTC-05:00)America/Rio_Branco</option>
                                        <option>(UTC-05:00)America/Winnipeg</option>
                                        <option>(UTC-04:00)America/Anguilla</option>
                                        <option>(UTC-04:00)America/Antigua</option>
                                        <option>(UTC-04:00)America/Aruba</option>
                                        <option>(UTC-04:00)America/Asuncion</option>
                                        <option>(UTC-04:00)America/Barbados</option>
                                        <option>(UTC-04:00)America/Blanc_Sablon</option>
                                        <option>(UTC-04:00)America/Boa_Vista</option>
                                        <option>(UTC-04:00)America/Campo_Grande</option>
                                        <option>(UTC-04:00)America/Caracas</option>
                                        <option>(UTC-04:00)America/Curacao</option>
                                        <option>(UTC-04:00)America/Detroit</option>
                                        <option>(UTC-04:00)America/Dominica</option>
                                        <option>(UTC-04:00)America/Grand_Turk</option>
                                        <option>(UTC-04:00)America/Grenada</option>
                                        <option>(UTC-04:00)America/Guadeloupe</option>
                                        <option>(UTC-04:00)America/Guyana</option>
                                        <option>(UTC-04:00)America/Havana</option>
                                        <option>(UTC-04:00)America/Indiana/Indianapolis</option>
                                        <option>(UTC-04:00)America/Indiana/Marengo</option>
                                        <option>(UTC-04:00)America/Indiana/Petersburg</option>
                                        <option>(UTC-04:00)America/Indiana/Vevay</option>
                                        <option>(UTC-04:00)America/Indiana/Vincennes</option>
                                        <option>(UTC-04:00)America/Indiana/Winamac</option>
                                        <option>(UTC-04:00)America/Iqaluit</option>
                                        <option>(UTC-04:00)America/Kentucky/Louisville</option>
                                        <option>(UTC-04:00)America/Kentucky/Monticello</option>
                                        <option>(UTC-04:00)America/Kralendijk</option>
                                        <option>(UTC-04:00)America/La_Paz</option>
                                        <option>(UTC-04:00)America/Lower_Princes</option>
                                        <option>(UTC-04:00)America/Manaus</option>
                                        <option>(UTC-04:00)America/Marigot</option>
                                        <option>(UTC-04:00)America/Martinique</option>
                                        <option>(UTC-04:00)America/Montserrat</option>
                                        <option>(UTC-04:00)America/Nassau</option>
                                        <option>(UTC-04:00)America/NewYork</option>
                                        <option>(UTC-04:00)America/Nipigon</option>
                                        <option>(UTC-04:00)America/Pantgnirtung</option>
                                        <option>(UTC-04:00)America/Port-au-Prince</option>
                                        <option>(UTC-04:00)America/Port_of_Spain</option>
                                        <option>(UTC-04:00)America/Porto_Velho</option>
                                        <option>(UTC-04:00)America/Puerto_Rico</option>
                                        <option>(UTC-04:00)America/Santiago</option>
                                        <option>(UTC-04:00)America/Santo_Domingo</option>
                                        <option>(UTC-04:00)America/St_Barthelemy</option>
                                        <option>(UTC-04:00)America/St_Kitts</option>
                                        <option>(UTC-04:00)America/St_Lucia</option>
                                        <option>(UTC-04:00)America/St_Thomas</option>
                                        <option>(UTC-04:00)America/St_Vincent</option>
                                        <option>(UTC-04:00)America/Thunder_Bay</option>
                                        <option>(UTC-04:00)America/Toronto</option>
                                        <option>(UTC-04:00)America/Tortola</option>
                                        <option>(UTC-03:00)America/Araguaina</option>
                                        <option>(UTC-03:00)America/Argentina/Buenos_Aires</option>
                                        <option>(UTC-03:00)America/Argentina/Catamarca</option>
                                        <option>(UTC-03:00)America/Argentina/Cordoba</option>
                                        <option>(UTC-03:00)America/Argentina/Jujuy</option>
                                        <option>(UTC-03:00)America/Argentina/La_Rioja</option>
                                        <option>(UTC-03:00)America/Argentina/Mendoza</option>
                                        <option>(UTC-03:00)America/Argentina/Rio_Gallegos</option>
                                        <option>(UTC-03:00)America/Argentina/Salta</option>
                                        <option>(UTC-03:00)America/Argentina/San_Juan</option>
                                        <option>(UTC-03:00)America/Argentina/San_Luis</option>
                                        <option>(UTC-03:00)America/Argentina/Tucuman</option>
                                        <option>(UTC-03:00)America/Argentina/Ushuaia</option>
                                        <option>(UTC-03:00)America/Bahia</option>
                                        <option>(UTC-03:00)America/Cayenne</option>
                                        <option>(UTC-03:00)America/Fortaleza</option>
                                        <option>(UTC-03:00)America/Glace_Bay</option>
                                        <option>(UTC-03:00)America/Goose_Bay</option>
                                        <option>(UTC-03:00)America/Halifax</option>
                                        <option>(UTC-03:00)America/Maceio</option>
                                        <option>(UTC-03:00)America/Moncton</option>
                                        <option>(UTC-03:00)America/Montevideo</option>
                                        <option>(UTC-03:00)America/Paramaribo</option>
                                        <option>(UTC-03:00)America/Punta_Arenas</option>
                                        <option>(UTC-03:00)America/Recife</option>
                                        <option>(UTC-03:00)America/Santarem</option>
                                        <option>(UTC-03:00)America/Sao_Paulo</option>
                                        <option>(UTC-03:00)America/Thule</option>
                                        <option>(UTC-03:00)America/Palmer</option>
                                        <option>(UTC-03:00)America/Rothera</option>
                                        <option>(UTC-03:00)America/Bermuda</option>
                                        <option>(UTC-03:00)America/Stanley</option>
                                        <option>(UTC-02:30)America/St_Jhons</option>
                                        <option>(UTC-02:00)America/Miquelon</option>
                                        <option>(UTC-02:00)America/Noronha</option>
                                        <option>(UTC-02:00)America/Nuuk</option>
                                        <option>(UTC-02:00)Atlantic/South_Georgia</option>
                                        <option>(UTC-01:00)Atlantic/Cape_Verde</option>
                                        <option>(UTC-00:53)Africa/Freetown</option>
                                        <option>(UTC+00:00)Africa/Abidjan</option>
                                        <option>(UTC+00:00)Africa/Accra</option>
                                        <option>(UTC+00:00)Africa/Bamako</option>
                                        <option>(UTC+00:00)Africa/Banjul</option>
                                        <option>(UTC+00:00)Africa/Bissau</option>
                                        <option>(UTC+00:00)Africa/Conakry</option>
                                        <option>(UTC+00:00)Africa/Dakar</option>
                                        <option>(UTC+00:00)Africa/Lome</option>
                                        <option>(UTC+00:00)Africa/Monrovia</option>
                                        <option>(UTC+00:00)Africa/Nouakchott</option>
                                        <option>(UTC+00:00)Africa/Ouagadougou</option>
                                        <option>(UTC+00:00)Africa/Sao_Tome</option>
                                        <option>(UTC+00:00)America/Danmarkshavn</option>
                                        <option>(UTC+00:00)America/Scoresbysund</option>
                                        <option>(UTC+00:00)Atlantic/Azores</option>
                                        <option>(UTC+00:00)Atlantic/Reykjavik</option>
                                        <option>(UTC+00:00)Atlantic/St_Helena</option>
                                        <option>(UTC+01:00)Africa/Algiers</option>
                                        <option>(UTC+01:00)Africa/Bangui</option>
                                        <option>(UTC+01:00)Africa/Brazzaville</option>
                                        <option>(UTC+01:00)Africa/Casablanca</option>
                                        <option>(UTC+01:00)Africa/Douala</option>
                                        <option>(UTC+01:00)Africa/El_Aaiun</option>
                                        <option>(UTC+01:00)Africa/Kinshasa</option>
                                        <option>(UTC+01:00)Africa/Lagos</option>
                                        <option>(UTC+01:00)Africa/Librreville</option>
                                        <option>(UTC+01:00)Africa/Malabo</option>
                                        <option>(UTC+01:00)Africa/Ndjamena</option>
                                        <option>(UTC+01:00)Africa/Niamey</option>
                                        <option>(UTC+01:00)Africa/Porto-Novo</option>
                                        <option>(UTC+01:00)Africa/Tunis</option>
                                        <option>(UTC+01:00)Atlantic/Canary</option>
                                        <option>(UTC+01:00)Atlantic/Faroe</option>
                                        <option>(UTC+01:00)Atlantic/Madeira</option>
                                        <option>(UTC+01:00)Europe/Dublin</option>
                                        <option>(UTC+01:00)Europe/Guernsey</option>
                                        <option>(UTC+01:00)Europe/Isle_of_Man</option>
                                        <option>(UTC+01:00)Europe/Jersey</option>
                                        <option>(UTC+01:00)Europe/Lisbon</option>
                                        <option>(UTC+01:00)Europe/London</option>
                                        <option>(UTC+02:00)Africa/Blantyre</option>
                                        <option>(UTC+02:00)Africa/Bujumbura</option>
                                        <option>(UTC+02:00)Africa/Cairo</option>
                                        <option>(UTC+02:00)Africa/Ceuta</option>
                                        <option>(UTC+02:00)Africa/Gaborone</option>
                                        <option>(UTC+02:00)Africa/Harare</option>
                                        <option>(UTC+02:00)Africa/Johannesburg</option>
                                        <option>(UTC+02:00)Africa/Juba</option>
                                        <option>(UTC+02:00)Africa/Khartoum</option>
                                        <option>(UTC+02:00)Africa/Kigali</option>
                                        <option>(UTC+02:00)Africa/Lubumbashi</option>
                                        <option>(UTC+02:00)Africa/Lusaka</option>
                                        <option>(UTC+02:00)Africa/Maputo</option>
                                        <option>(UTC+02:00)Africa/Maseru</option>
                                        <option>(UTC+02:00)Africa/Mbabane</option>
                                        <option>(UTC+02:00)Africa/Tripoli</option>
                                        <option>(UTC+02:00)Africa/Windhoek</option>
                                        <option>(UTC+02:00)Antarctica/Troll</option>
                                        <option>(UTC+02:00)Europe/Amsterdam</option>
                                        <option>(UTC+02:00)Europe/Andorra</option>
                                        <option>(UTC+02:00)Europe/Belgrade</option>
                                        <option>(UTC+02:00)Europe/Berlin</option>
                                        <option>(UTC+02:00)Europe/Bratislava</option>
                                        <option>(UTC+02:00)Europe/Brussels</option>
                                        <option>(UTC+02:00)Europe/Budapest</option>
                                        <option>(UTC+02:00)Europe/Busingen</option>
                                        <option>(UTC+02:00)Europe/Copenhagen</option>
                                        <option>(UTC+02:00)Europe/Gibraltar</option>
                                        <option>(UTC+02:00)Europe/Kaliningrad</option>
                                        <option>(UTC+02:00)Europe/Ljubljana</option>
                                        <option>(UTC+02:00)Europe/Luxembourg</option>
                                        <option>(UTC+02:00)Europe/Madrid</option>
                                        <option>(UTC+02:00)Europe/Malta</option>
                                        <option>(UTC+02:00)Europe/Manaco</option>
                                        <option>(UTC+02:00)Europe/Olso</option>
                                        <option>(UTC+02:00)Europe/Paris</option>
                                        <option>(UTC+02:00)Europe/Podgorica</option>
                                        <option>(UTC+02:00)Europe/Prague</option>
                                        <option>(UTC+02:00)Europe/Rome</option>
                                        <option>(UTC+02:00)Europe/San_Marino</option>
                                        <option>(UTC+02:00)Europe/Sarajevo</option>
                                        <option>(UTC+02:00)Europe/Skopje</option>
                                        <option>(UTC+02:00)Europe/Stockholm</option>
                                        <option>(UTC+02:00)Europe/Tirane</option>
                                        <option>(UTC+02:00)Europe/Vaduz</option>
                                        <option>(UTC+02:00)Europe/Vatican</option>
                                        <option>(UTC+02:00)Europe/Vienna</option>
                                        <option>(UTC+02:00)Europe/Warsaw</option>
                                        <option>(UTC+02:00)Europe/Zagreb</option>
                                        <option>(UTC+02:00)Europe/Zurich</option>
                                        <option>(UTC+03:00)Africa/Addis_Ababa</option>
                                        <option>(UTC+03:00)Africa/Asmara</option>
                                        <option>(UTC+03:00)Africa/Dar_es_Salaam</option>
                                        <option>(UTC+03:00)Africa/Djibouti</option>
                                        <option>(UTC+03:00)Africa/Kampala</option>
                                        <option>(UTC+03:00)Africa/Mogadishu</option>
                                        <option>(UTC+03:00)Africa/Nairobi</option>
                                        <option>(UTC+03:00)Antarctica/Syowa</option>
                                        <option>(UTC+03:00)Asia/Aden</option>
                                        <option>(UTC+03:00)Asia/Amman</option>
                                        <option>(UTC+03:00)Asia/Baghdad</option>
                                        <option>(UTC+03:00)Asia/Bahrain</option>
                                        <option>(UTC+03:00)Asia/Beirut</option>
                                        <option>(UTC+03:00)Asia/Damascus</option>
                                        <option>(UTC+03:00)Asia/Famagusta</option>
                                        <option>(UTC+03:00)Asia/Gaza</option>
                                        <option>(UTC+03:00)Asia/Hebron</option>
                                        <option>(UTC+03:00)Asia/Jerusalem</option>
                                        <option>(UTC+03:00)Asia/Kuwait</option>
                                        <option>(UTC+03:00)Asia/Nicosia</option>
                                        <option>(UTC+03:00)Asia/Qatar</option>
                                        <option>(UTC+03:00)Asia/Riyadh</option>
                                        <option>(UTC+03:00)Europe/Athens</option>
                                        <option>(UTC+03:00)Europe/Bucharest</option>
                                        <option>(UTC+03:00)Europe/Chisinau</option>
                                        <option>(UTC+03:00)Europe/Helsinki</option>
                                        <option>(UTC+03:00)Europe/Istanbul</option>
                                        <option>(UTC+03:00)Europe/Kirofa-flip-vertical</option>
                                        <option>(UTC+03:00)Europe/Kyiv</option>
                                        <option>(UTC+03:00)Europe/Mariehamn</option>
                                        <option>(UTC+03:00)Europe/Minsk</option>
                                        <option>(UTC+03:00)Europe/Moscow</option>
                                        <option>(UTC+03:00)Europe/Riga</option>
                                        <option>(UTC+03:00)Europe/Simferopol</option>
                                        <option>(UTC+03:00)Europe/Sofia</option>
                                        <option>(UTC+03:00)Europe/Tallinn</option>
                                        <option>(UTC+03:00)Europe/Uzhgorod</option>
                                        <option>(UTC+03:00)Europe/Vilnius</option>
                                        <option>(UTC+03:00)Europe/Volgograd</option>
                                        <option>(UTC+03:00)Indian/Antananarivo</option>
                                        <option>(UTC+03:00)Indian/Comoro</option>
                                        <option>(UTC+03:00)Indian/Mayotte</option>
                                        <option>(UTC+03:30)Asia/Tehran</option>
                                        <option>(UTC+04:00)Asia/Baku</option>
                                        <option>(UTC+04:00)Asia/Dubai</option>
                                        <option>(UTC+04:00)Asia/Muscot</option>
                                        <option>(UTC+04:00)Asia/Tbilisi</option>
                                        <option>(UTC+04:00)Asia/Yerevan</option>
                                        <option>(UTC+04:00)Europe/Astrakhan</option>
                                        <option>(UTC+04:00)Europe/Samara</option>
                                        <option>(UTC+04:00)Europe/Saratov</option>
                                        <option>(UTC+04:00)Europe/Ulyanovsk</option>
                                        <option>(UTC+04:00)Indian/Mahe</option>
                                        <option>(UTC+04:00)Indian/Mauritius</option>
                                        <option>(UTC+04:00)Indian/Reunion</option>
                                        <option>(UTC+04:30)Asia/Kabul</option>
                                        <option>(UTC+05:00)Antarctica/Mawson</option>
                                        <option>(UTC+05:00)Asia/Aqtau</option>
                                        <option>(UTC+05:00)Asia/Aqtobe</option>
                                        <option>(UTC+05:00)Asia/Ashgabat</option>
                                        <option>(UTC+05:00)Asia/Atyraw</option>
                                        <option>(UTC+05:00)Asia/Dushanbe</option>
                                        <option>(UTC+05:00)Asia/Karachi</option>
                                        <option>(UTC+05:00)Asia/Oral</option>
                                        <option>(UTC+05:00)Asia/Qyzylorda</option>
                                        <option>(UTC+05:00)Asia/Samarkand</option>
                                        <option>(UTC+05:00)Asia/Tashkent</option>
                                        <option>(UTC+05:00)Asia/Yekaterinburg</option>
                                        <option>(UTC+05:00)Indian/Kerguelen</option>
                                        <option>(UTC+05:00)Indian/Maldives</option>
                                        <option>(UTC+05:30)Asia/Colombo</option>
                                        <option>(UTC+05:30)Asia/Kolkata</option>
                                        <option>(UTC+05:45)Asia/Kathmandu</option>
                                        <option>(UTC+06:00)Antarctica/Vostok</option>
                                        <option>(UTC+06:00)Asia/Almaty</option>
                                        <option>(UTC+06:00)Asia/Bishkek</option>
                                        <option>(UTC+06:00)Asia/Dhaka</option>
                                        <option>(UTC+06:00)Asia/Omsk</option>
                                        <option>(UTC+06:00)Asia/Qostanay</option>
                                        <option>(UTC+06:00)Asia/Thimphu</option>
                                        <option>(UTC+06:00)Asia/Urunqi</option>
                                        <option>(UTC+06:00)Indian/Chagos</option>
                                        <option>(UTC+06:30)Asia/Yangon</option>
                                        <option>(UTC+06:30)Indian/Cocos</option>
                                        <option>(UTC+07:00)Antarctica/Davis</option>
                                        <option>(UTC+07:00)Asia/Bangkok</option>
                                        <option>(UTC+07:00)Asia/Barnaul</option>
                                        <option>(UTC+07:00)Asia/Ho_Chi_Minh</option>
                                        <option>(UTC+07:00)Asia/Hovd</option>
                                        <option>(UTC+07:00)Asia/Jakarta</option>
                                        <option>(UTC+07:00)Asia/Krasnoyarsk</option>
                                        <option>(UTC+07:00)Asia/Novokuznetsk</option>
                                        <option>(UTC+07:00)Asia/Novosibirsk</option>
                                        <option>(UTC+07:00)Asia/Phnom_Penh</option>
                                        <option>(UTC+07:00)Asia/Pontianak</option>
                                        <option>(UTC+07:00)Asia/Tomsk</option>
                                        <option>(UTC+07:00)Asia/Vientiane</option>
                                        <option>(UTC+07:00)Indian/Christmas</option>
                                        <option>(UTC+08:00)Asia/Brunei</option>
                                        <option>(UTC+08:00)Asia/Choibalsan</option>
                                        <option>(UTC+08:00)Asia/Hong_Kong</option>
                                        <option>(UTC+08:00)Asia/Irkutsk</option>
                                        <option>(UTC+08:00)Asia/Kuala_Lumpur</option>
                                        <option>(UTC+08:00)Asia/Kuching</option>
                                        <option>(UTC+08:00)Asia/Macau</option>
                                        <option>(UTC+08:00)Asia/Shanghai</option>
                                        <option>(UTC+08:00)Asia/Singapore</option>
                                        <option>(UTC+08:00)Asia/Taipei</option>
                                        <option>(UTC+08:00)Asia/Ulaanbaatar</option>
                                        <option>(UTC+08:00)Australia/Perth</option>
                                        <option>(UTC+08:45)Australia/Eucla</option>
                                        <option>(UTC+09:00)Asia/Chita</option>
                                        <option>(UTC+09:00)Asia/Dili</option>
                                        <option>(UTC+09:00)Asia/Jayapura</option>
                                        <option>(UTC+09:00)Asia/Khandyga</option>
                                        <option>(UTC+09:00)Asia/Pyongyang</option>
                                        <option>(UTC+09:00)Asia/Seoul</option>
                                        <option>(UTC+09:00)Asia/Tokyo</option>
                                        <option>(UTC+09:00)Asia/Yakutsk</option>
                                        <option>(UTC+09:00)Pacific/Palau</option>
                                        <option>(UTC+09:30)Australia/Adelaide</option>
                                        <option>(UTC+09:30)Australia/Broken_Hill</option>
                                        <option>(UTC+09:30)Australia/Darwin</option>
                                        <option>(UTC+10:00)Antarctica/DumontDUrville</option>
                                        <option>(UTC+10:00)Antarctica/Macquarie</option>
                                        <option>(UTC+10:00)Asia/Ust-Nera</option>
                                        <option>(UTC+10:00)Asia/Vladivostok</option>
                                        <option>(UTC+10:00)Australia/Brisbane</option>
                                        <option>(UTC+10:00)Australia/Hobart</option>
                                        <option>(UTC+10:00)Australia/Hobart</option>
                                        <option>(UTC+10:00)Australia/Lindeman</option>
                                        <option>(UTC+10:00)Australia/Melbourne</option>
                                        <option>(UTC+10:00)Australia/Sudney</option>
                                        <option>(UTC+10:00)Pacific/Chuuk</option>
                                        <option>(UTC+10:00)Pacific/Guam</option>
                                        <option>(UTC+10:00)Pacific/Port_Moresby</option>
                                        <option>(UTC+10:00)Pacific/Saipan</option>
                                        <option>(UTC+10:30)Australia/Lord_Howe</option>
                                        <option>(UTC+11:00)Antarctica/Casey</option>
                                        <option>(UTC+11:00)Asia/Magadan</option>
                                        <option>(UTC+11:00)Asia/Sakhalin</option>
                                        <option>(UTC+11:00)Asia/Srednekolymsk</option>
                                        <option>(UTC+11:00)Pacific/Bougainville</option>
                                        <option>(UTC+11:00)Pacific/Efate</option>
                                        <option>(UTC+11:00)Pacific/Guadalcanal</option>
                                        <option>(UTC+11:00)Pacific/Kosrae</option>
                                        <option>(UTC+11:00)Pacific/Norfolk</option>
                                        <option>(UTC+11:00)Pacific/Noumea</option>
                                        <option>(UTC+11:00)Pacific/Pohnpei</option>
                                        <option>(UTC+12:00)Antarctica/McMurdo</option>
                                        <option>(UTC+12:00)Asia/Anadyr</option>
                                        <option>(UTC+12:00)Asia/Kamchatka</option>
                                        <option>(UTC+12:00)Pacific/Auckland</option>
                                        <option>(UTC+12:00)Pacific/Fiji</option>
                                        <option>(UTC+12:00)Pacific/Funafuti</option>
                                        <option>(UTC+12:00)Pacific/Kwajalein</option>
                                        <option>(UTC+12:00)Pacific/Majuro</option>
                                        <option>(UTC+12:00)Pacific/Nauru</option>
                                        <option>(UTC+12:00)Pacific/Tarawa</option>
                                        <option>(UTC+12:00)Pacific/Wake</option>
                                        <option>(UTC+12:00)Pacific/Wallis</option>
                                        <option>(UTC+12:45)Pacific/Chatham</option>
                                        <option>(UTC+13:00)Pacific/Apia</option>
                                        <option>(UTC+13:00)Pacific/Fakaofo</option>
                                        <option>(UTC+13:00)Pacific/Kanton</option>
                                        <option>(UTC+13:00)Pacific/Tongatapu</option>
                                        <option>(UTC+14:00)Pacific/Kritimati</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Date Format</strong></label>
                                    <select name="currency_symbol" class="form-control">
                                        <option>mm-dd-yyyy</option>
                                        <option>dd-mm-yyyy</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Stock Accounting Method</strong></label>
                                    <select name="currency_symbol" class="form-control" class="arrow">
                                        <option>FIFO (First In First Out)</option>
                                        <option>LIFO (Last In First Out)</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Currency Precision</strong></label>
                                    <select name="currency_symbol" class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Quantity Precision</strong></label>
                                    <select name="currency_symbol" class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="name"><strong>Defaoult Datatable Page Entries</strong></label>
                                    <select name="currency_symbol" class="form-control">
                                        <option>25</option>
                                        <option>50</option>
                                        <option>100</option>
                                        <option>200</option>
                                        <option>500</option>
                                        <option>1000</option>
                                        <option>All</option>
                                    </select>
                                </div><br>
                                <input type="submit" value="Submit" class="btn btn-success mergin-right" >
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Hoverable Table rows -->
@push('js')
<script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endpush


@endsection
