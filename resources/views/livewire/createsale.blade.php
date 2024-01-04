<div >
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
        .form {

            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 0.9rem;
            margin: -687px 0px 0px 345px;
            /* user-select:none; */
            /* pointer-events: auto; */
        }
        body .form table {
            padding: 10px;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            width: 80%;
            margin-top: 10px;
            border: 2px solid #ccc;
        }
        .form table th {
            user-select: none;
            padding: 5px;
            text-align: left;
            height: 50px;
            background-color: rgb(190, 207, 186);
            font-weight: bold;
        }
        .form table tr {
            width: 95%;
            min-height: 35px;
        }
        .form table tr:nth-child(odd) td:not(:empty) {
            background-color: rgb(225, 241, 222);
        }
        .form table td {
            padding: 5px;
            /* width:100%; */
        }

        .form input {
            border: none;
            background: none;
            outline: none;
        }

        .form select {
            background: none;
            background-color: none;
            border: none;
            outline: none;
        }

        .form button {
            user-select: none;
            pointer-events:auto;
            border: none;
            color: rgb(10, 119, 83);
            background: none;
            width: 30px;
            height: 30px;
            padding: 3px;
        }

        .sales {
            user-select: none;
            border-color: rgb(10, 119, 83);
            border-width: 4px;
            overflow: hidden;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 0.9rem;
            width: 275px;
            height: 250px;
            margin: 15px 245px 0px 0px;
            float: right;
            border-radius: 5px;
            border-collapse: collapse;
        }

        .sales tr td {
            width: 95%;
            padding: 5px;
        }

        .sales tr:nth-child(odd) {
            background-color: rgb(225, 241, 222);
            /* color: rgb(168, 8, 8); */
        }

        .sales button {
            pointer-events: auto;
            margin-left: 200px;
            float: right;
            border: 1px solid black;
            color: white;
            height: 25px;
            width: 75px;
            border-radius: 3px;
            background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
        }

        @media (max-width: 926px) {
            .sales {

                margin: 15px -245px 0px 0px;

            }

        }

        .modal {

            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        #myModal {
            /* display: none; */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            padding: 10px;
            max-height: 500px;
            overflow-y: auto;
            background-color: #ffffff;
            border: 1px solid black;
            border-radius: 3px;
            z-index: 1;
        }
    </style>

    <div class="form">
        <h1> Add Sales </h1>
        <p style= "font-size:1rem;">Date:</p>
        <p style="margin: -37px 0px 11px 100px;"> <input type="date" class="form-control" wire:model="date" />
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </p>


        <button wire:click="openModal()"
            style="display: inline-block; border: 1px solid black; color: white;
             border-radius: 3px; background: linear-gradient(to bottom, rgb(10, 119, 83), rgb(0, 41, 27));
             width: 140px; height: 25px; vertical-align: middle; padding-left: -6px">
            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 42 42"
                xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                style="vertical-align: top; padding-right: -3px;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            Search Product
        </button>

        @if (session()->has('delete'))
        <br><br>
        <div
            style="  background-color: rgb(190, 207, 186);
                    color:rgb(0, 0, 0);margin: 0px 0px 14px 0px; width: calc(81% - 10px);
                    border: none; border-radius: 3px; display: flex; align-items: center; justify-content: center; height: 30px; ">
            {{ session('message') }}
        </div>
        @endif
            @if ($search_modal == true)
                <div id="myModal" class="modal"wire:ignore.self
                style=" width: 700px; padding:10px; max-height:500px; overflow-y: auto; background-color:white;">
                    <span wire:click="back()"
                    style="cursor: pointer; float:right; width:21px; height: 21px;
                border:1px solid black; border-radius:3px; color: rgb(10, 119, 83);
                display: flex; justify-content: center; align-items: center; margin:0px 3px 0px 0px;">
                    &times;
                </span>
                <div>
                    <input
                        style="border: 1px solid black; overflow: hidden; border-radius: 3px; margin-bottom: 5px; height: 25px; width: 95%"
                        wire:model.lazy="product_name" wire:input="searching" type="search"
                        placeholder="search product name" />
                </div>

                <div>
                    <table style="width:100%; margin:0px  ">

                        @if (count($products) > 0)
                            <tr>
                                <th>No.</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Add</th>
                            </tr>
                            @foreach ($products as $item)
                                <tr>
                                    <td >{{ $loop->iteration }}
                                    </td>
                                    <td style="max-width: 100px; word-wrap: break-word; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $item->product_name }}
                                    </td>
                                    {{-- text-overflow: ellipsis; white-space: nowrap; overflow: hidden;--}}
                                    <td style="max-width: 250px; word-wrap: break-word; ">
                                        {{ $item->description }}
                                    </td>
                                    <td >
                                        {{ $item->amount }}
                                    </td>
                                    <td >
                                        {{ $item->product_type }}
                                    </td>
                                    <td>
                                        <button wire:click="addProductToTable({{ $item->id }})">Add</button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>Data not found</p>
                        @endif
                    </table>
                </div>
                </div>
            @endif


        <table class="table">
            <tr>
                <th>No.</th>
                <th>Product</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Gross Price</th>
                <th><button style="width:30px; height:20px;" wire:click.prevent="addEmptyRow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="auto" height="29" style="margin-top: -4px;"
                            viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </button></th>

            </tr>
            @foreach ($sale_products as $index => $p)
                <tr wire:key="{{ $index }}">

                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <input type="text"placeholder="Product name" disabled
                            style="pointer-events:none;  user-select:none;"
                            wire:model="sale_products.{{ $index }}.product_name" />
<br>
                           @error("sale_products.{$index}.product_name")

                        <span style="color: red; font-size: 0.7rem;">
                            <br>{{ $message }}
                        </span>
                    @enderror

                    </td>

                    <td>
                        <input type="number" placeholder="0.00" disabled style="pointer-events:none; user-select:none;"
                            wire:model="sale_products.{{ $index }}.product_price_with_profit" />
                        @error("sale_products.{$index}.product_price_with_profit")
                            <span style="color: red; font-size: 0.7rem;"><br>
                                <br>{{ $message }}
                                {{-- {{ $this->attributes()['sale_products.*.product_price_with_profit'] }} field is
                                required. --}}
                            </span>
                        @enderror
                    </td>

                    <td>
                        <input type="number"placeholder="0.00"
                            wire:model.live="sale_products.{{ $index }}.product_quantity" />

                        @error("sale_products.{$index}.product_quantity")
                            <span style="color: red; font-size:0.7rem;"> <br>
                                {{ $this->attributes()['sale_products.*.product_quantity'] }} field is required.</span>
                        @enderror
                    </td>

                    <td>
                        <input type="number" placeholder="0.00" style="pointer-events:none;  user-select:none;"
                            disabled wire:model="sale_products.{{ $index }}.gross_price" />
                        @error("sale_products.{$index}.gross_price")
                            <br>
                            <span style="color: red; font-size:0.7rem;">
                                {{ $this->attributes()['sale_products.*.gross_price'] }} field is required.</span>
                        @enderror
                    </td>

                    <td style="display: flex; align-items: center;">
                        <button style="width:30px;" wire:click.prevent="addprofit({{ $index }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="auto" height="29"
                                style="margin-top: -4px;" viewBox="0 0 24 24" fill="none" stroke="black"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>

                        <button style="width:30px; display: flex; align-items: center;"
                            wire:click.prevent="delete({{ $index }})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 408.483 408.483" width="60"
                                height="60" style="transform: scale(0.8)">
                                <g fill="rgb(168, 8, 8)" stroke="red" stroke-width="2">
                                    <path
                                        d="M87.748,388.784c0.461,11.01,9.521,19.699,20.539,19.699h191.911c11.018,0,20.078-8.689,20.539-19.699l13.705-289.316 H74.043L87.748,388.784z M247.655,171.329c0-4.61,3.738-8.349,8.35-8.349h13.355c4.609,0,8.35,3.738,8.35,8.349v165.293 c0,4.611-3.738,8.349-8.35,8.349h-13.355c-4.61,0-8.35-3.736-8.35-8.349V171.329z M189.216,171.329 c0-4.61,3.738-8.349,8.349-8.349h13.355c4.609,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.737,8.349-8.349,8.349h-13.355 c-4.61,0-8.349-3.736-8.349-8.349V171.329L189.216,171.329z M130.775,171.329c0-4.61,3.738-8.349,8.349-8.349h13.356 c4.61,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.738,8.349-8.349,8.349h-13.356c-4.61,0-8.349-3.736-8.349-8.349V171.329z">
                                    </path>
                                    <path
                                        d="M343.567,21.043h-88.535V4.305c0-2.377-1.927-4.305-4.305-4.305h-92.971c-2.377,0-4.304,1.928-4.304,4.305v16.737H64.916 c-7.125,0-12.9,5.776-12.9,12.901V74.47h304.451V33.944C356.467,26.819,350.692,21.043,343.567,21.043z">
                                    </path>
                                </g>
                            </svg>
                        </button>
                    </td>

                    @if (isset($profitRows[$index]))
                        @foreach ($profitRows[$index] as $profitIndex => $profitRow)
                <tr class="with-border" wire:key="{{ $index }}-profit-{{ $profitIndex }}">
                    <td></td>

                    <td>
                        <select name="type" id="type" placeholder="0.00"
                            wire:model="profitRows.{{ $index }}.{{ $profitIndex }}.type"
                            wire:change="calculateTotalProfit">
                            <option>Please select</option>
                            <option value="Profit">Profit</option>
                            <option value="Expense">Expense</option>
                        </select>

                        @error("profitRows.{$index}.{$profitIndex}.type")
                            <span style="color: red; font-size:0.7rem;">
                                <br>{{ $message }}</span>
                        @enderror
                    </td>

                    <td>
                        <input type="text"placeholder="Description"
                            wire:model="profitRows.{{ $index }}.{{ $profitIndex }}.description"
                            wire:change="calculateTotalProfit" />
                        @error("profitRows.{$index}.{$profitIndex}.description")
                            <span style="color: red; font-size:0.7rem;">
                                <br>{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <input type="number" placeholder="0.00"
                            wire:model="profitRows.{{ $index }}.{{ $profitIndex }}.amount"
                            wire:change="calculateTotalProfit" />
                        @error("profitRows.{$index}.{$profitIndex}.amount")
                            <span style="color: red; font-size:0.7rem;">
                                <br>{{ $message }}
                            </span>
                        @enderror
                    </td>

                    <td>
                        <button style="width:30px; display: flex; align-items: center;"
                            wire:click.prevent="deleteit({{ $index }}, {{ $profitIndex }})">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 408.483 408.483" width="60"
                                height="60" style="transform: scale(0.8)">
                                <g fill="rgb(168, 8, 8)" stroke="red" stroke-width="2">
                                    <path
                                        d="M87.748,388.784c0.461,11.01,9.521,19.699,20.539,19.699h191.911c11.018,0,20.078-8.689,20.539-19.699l13.705-289.316 H74.043L87.748,388.784z M247.655,171.329c0-4.61,3.738-8.349,8.35-8.349h13.355c4.609,0,8.35,3.738,8.35,8.349v165.293 c0,4.611-3.738,8.349-8.35,8.349h-13.355c-4.61,0-8.35-3.736-8.35-8.349V171.329z M189.216,171.329 c0-4.61,3.738-8.349,8.349-8.349h13.355c4.609,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.737,8.349-8.349,8.349h-13.355 c-4.61,0-8.349-3.736-8.349-8.349V171.329L189.216,171.329z M130.775,171.329c0-4.61,3.738-8.349,8.349-8.349h13.356 c4.61,0,8.349,3.738,8.349,8.349v165.293c0,4.611-3.738,8.349-8.349,8.349h-13.356c-4.61,0-8.349-3.736-8.349-8.349V171.329z">
                                    </path>
                                    <path
                                        d="M343.567,21.043h-88.535V4.305c0-2.377-1.927-4.305-4.305-4.305h-92.971c-2.377,0-4.304,1.928-4.304,4.305v16.737H64.916 c-7.125,0-12.9,5.776-12.9,12.901V74.47h304.451V33.944C356.467,26.819,350.692,21.043,343.567,21.043z">
                                    </path>
                                </g>
                            </svg>
                        </button>
                    </td>
                    <td></td>
                </tr>
            @endforeach
            @endif
            </tr>
            @endforeach
        </table>
    </div>
    <table class="sales">
        <tr>
            <td>Expenditure:</td>
            <td >{{ $expenditure }}</td>
        </tr>
        <tr>
            <td>Profit: </td>
            <td>{{ $profit }}</td>
        </tr>
        <tr>
            <td>Total amount:</td>
            <td>{{ $total_amount }}</td>
        </tr>
        <tr>
            <td> <button wire:click="store()">Add Sales</button></td>
        </tr>
    </table>


</div>

{{-- <script>
        function openModal() {
            document.getElementById('myModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
            @this.set('product_name', '');
            @this.set('products', []);
        }
    </script> --}}
