<div
    class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
    <div class="lg:pr-4">
        <div class="max-w-xl text-base leading-7 text-gray-700 lg:max-w-lg">

            <h2 class="mt-0 text-2xl font-bold tracking-tight text-gray-900">Additional Information:</h2>
            <ul role="list" class="grid grid-cols-2 gap-x-16 items-baseline space-y-8 text-gray-600">
                <x-additional-info name="Area" :value="$restaurant->additional_info_area">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M120-160v-520l160 120 200-280 200 160h160v520H120Zm200-120 160-220 280 218v-318H652L496-725 298-447l-98-73v144l120 96Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Location" :value="$restaurant->additional_info_location">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Hours of operation" :value="$restaurant->additional_info_hours_of_operation">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" />
                    </svg>
                </x-additional-info>
                <x-price :priceInfo="$restaurant->additional_info_price" />
                <x-additional-info name="Cuisines" :value="$restaurant->additional_info_cuisines">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M280-80v-366q-51-14-85.5-56T160-600v-280h80v280h40v-280h80v280h40v-280h80v280q0 56-34.5 98T360-446v366h-80Zm400 0v-320H560v-280q0-83 58.5-141.5T760-880v800h-80Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Dining Style" :value="$restaurant->additional_info_dining_style">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M120-640h720v360q0 50-35 85t-85 35H240q-50 0-85-35t-35-85v-360Zm80 80v280q0 17 11.5 28.5T240-240h480q17 0 28.5-11.5T760-280v-280H200Zm-80-120v-80h240v-40q0-17 11.5-28.5T400-840h160q17 0 28.5 11.5T600-800v40h240v80H120Zm360 280Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Dress code" :value="$restaurant->additional_dress_code">

                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M280-80v-240h-64q-40 0-68-28t-28-68q0-29 16-53.5t42-36.5l262-116v-26q-36-13-58-43.5T360-760q0-50 35-85t85-35q50 0 85 35t35 85h-80q0-17-11.5-28.5T480-800q-17 0-28.5 11.5T440-760q0 17 11.5 28.5T480-720t28.5 11.5Q520-697 520-680v58l262 116q26 12 42 36.5t16 53.5q0 40-28 68t-68 28h-64v240H280Zm-64-320h64v-40h400v40h64q7 0 11.5-5t4.5-13q0-5-2.5-8.5T750-432L480-552 210-432q-5 2-7.5 5.5T200-418q0 8 4.5 13t11.5 5Zm144 240h240v-200H360v200Zm0-200h240-240Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Parking" :value="$restaurant->additional_parking_details">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M240-120v-720h280q100 0 170 70t70 170q0 100-70 170t-170 70H400v240H240Zm160-400h128q33 0 56.5-23.5T608-600q0-33-23.5-56.5T528-680H400v160Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Payment Options" :value="$restaurant->additional_payment_options">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M560-440q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM280-320q-33 0-56.5-23.5T200-400v-320q0-33 23.5-56.5T280-800h560q33 0 56.5 23.5T920-720v320q0 33-23.5 56.5T840-320H280Zm80-80h400q0-33 23.5-56.5T840-480v-160q-33 0-56.5-23.5T760-720H360q0 33-23.5 56.5T280-640v160q33 0 56.5 23.5T360-400Zm440 240H120q-33 0-56.5-23.5T40-240v-440h80v440h680v80ZM280-400v-320 320Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Executive Chef" :value="$restaurant->additional_executive_chef">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M640-680q17 0 28.5-11.5T680-720q0-17-11.5-28.5T640-760q-17 0-28.5 11.5T600-720q0 17 11.5 28.5T640-680Zm-160 0q17 0 28.5-11.5T520-720q0-17-11.5-28.5T480-760q-17 0-28.5 11.5T440-720q0 17 11.5 28.5T480-680Zm-160 0q17 0 28.5-11.5T360-720q0-17-11.5-28.5T320-760q-17 0-28.5 11.5T280-720q0 17 11.5 28.5T320-680ZM200-560v360h560v-360H200Zm200 160h160v-80H400v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm280-440Zm0 0Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Website" :value="$restaurant->additional_website">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q83 0 155.5 31.5t127 86q54.5 54.5 86 127T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Zm0-82q26-36 45-75t31-83H404q12 44 31 83t45 75Zm-104-16q-18-33-31.5-68.5T322-320H204q29 50 72.5 87t99.5 55Zm208 0q56-18 99.5-55t72.5-87H638q-9 38-22.5 73.5T584-178ZM170-400h136q-3-20-4.5-39.5T300-480q0-21 1.5-40.5T306-560H170q-5 20-7.5 39.5T160-480q0 21 2.5 40.5T170-400Zm216 0h188q3-20 4.5-39.5T580-480q0-21-1.5-40.5T574-560H386q-3 20-4.5 39.5T380-480q0 21 1.5 40.5T386-400Zm268 0h136q5-20 7.5-39.5T800-480q0-21-2.5-40.5T790-560H654q3 20 4.5 39.5T660-480q0 21-1.5 40.5T654-400Zm-16-240h118q-29-50-72.5-87T584-782q18 33 31.5 68.5T638-640Zm-234 0h152q-12-44-31-83t-45-75q-26 36-45 75t-31 83Zm-200 0h118q9-38 22.5-73.5T376-782q-56 18-99.5 55T204-640Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Phone number" :value="$restaurant->additional_phone_number">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M760-480q0-117-81.5-198.5T480-760v-80q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480h-80Zm-160 0q0-50-35-85t-85-35v-80q83 0 141.5 58.5T680-480h-80Zm198 360q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Menu" :value="$restaurant->additional_menu">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M560-564v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-600q-38 0-73 9.5T560-564Zm0 220v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-380q-38 0-73 9t-67 27Zm0-110v-68q33-14 67.5-21t72.5-7q26 0 51 4t49 10v64q-24-9-48.5-13.5T700-490q-38 0-73 9.5T560-454ZM260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Private party" :value="$restaurant->additional_private_party_facilities">
                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M120-80v-80h80v-128q-35-12-57.5-42.5T120-400v-320h240v320q0 39-22.5 69.5T280-288v128h80v80H120Zm80-440h80v-120h-80v120Zm40 160q17 0 28.5-11.5T280-400v-40h-80v40q0 17 11.5 28.5T240-360ZM520-80q-33 0-56.5-23.5T440-160v-382q0-26 15-46.5t39-29.5l38-14q14-5 21-14.5t7-23.5v-170q0-17 11.5-28.5T600-880h120q17 0 28.5 11.5T760-840v170q0 14 7 23.5t21 14.5l38 14q24 9 39 29.5t15 46.5v382q0 33-23.5 56.5T800-80H520Zm120-680h40v-40h-40v40ZM520-480h280v-62l-38-14q-38-14-60-44t-22-68v-12h-40v12q0 38-22 68t-60 44l-38 14v62Zm0 320h280v-80H520v80Zm0-160h280v-80H520v80ZM240-440Zm280 120v-80 80Z" />
                    </svg>
                </x-additional-info>
                <x-additional-info name="Smoking area" :value="$restaurant->additional_smoking_area">

                    <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path
                            d="M80-200v-120h600v120H80Zm640 0v-120h60v120h-60Zm100 0v-120h60v120h-60ZM720-360v-52q0-39-23-59.5T642-492h-62q-56 0-95-39t-39-95q0-56 39-95t95-39v60q-30 0-52 21t-22 53q0 32 22 53t52 21h62q56 0 97 36t41 90v66h-60Zm100 0v-90q0-66-46-114t-114-48v-60q30 0 52-22t22-52q0-30-22-52t-52-22v-60q56 0 95 39t39 95q0 29-11 52.5T754-650q56 26 91 80t35 120v90h-60Z" />
                    </svg>
                </x-additional-info>
            </ul>
        </div>
    </div>
</div>
