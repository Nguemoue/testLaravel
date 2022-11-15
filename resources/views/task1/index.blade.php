<x-app-layout>
    <h1 class="text-center">
        Task 1
    </h1>
    <hr class="my-2">
    <div class="container mx-auto my-2">
        <div class="card">
            <div class="card-header">
                <h3>Transaction Report</h3>
            </div>
            <br>
            <div class="row px-1">
                <div class="col-8">
                    <form method="POST" class="d-flex align-items-evently justify-content-around" action="{{ route('task1.filter') }}" class="form">
                        @csrf
                        <div class="">
                            <label for="distributor">Distributor</label>
                            <input class="form-control" value="{{ old('distributor') }}" type="text" name="distributor">
                        </div>
                        <div class="ml-2">
                            <label for="date_from">date from</label>
                            <input class="form-control" type="date" name="date_from">
                        </div>
                        <div class="ml-2">
                            <label for="date_to">date to</label>
                            <input type="date" class="form-control" name="date_to">
                        </div>
                        <button type="submit" class="mt-2  btn btn-primary flex-none">filter</button>
                    </form>
                </div>
                <div class="col-4">
                    <h4 class="">total commission</h4>
                    <div class="mx-2">
                        <label  for="search">Search</label> <input type="search" class="form-control">
                    </div>
                </div>
            </div>
            <div class="table-responsive my-3">
                <table class="w-full table table-bordered ">
                    <thead class="">
                        <tr class="px-2">
                            <th >Invoice</th>
                            <th >Purchaser</th>
                            <th >Distributor</th>
                            <th >Refered Distributor</th>
                            <th >Order Date</th>
                            <th >Order Total</th>
                            <th >Percentage</th>
                            <th >Commission</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="border">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->purchaser->last_name }}</td>
                                <td>{{ $order->purchaser->getDistributor()?->first_name }}</td>
                                <td>{{ $order->purchaser->countDistributor() }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order?->orderTotal() }}</td>
                                <td>{{ ($order->purchaser->percentage*100).'%' }}</td>
                                <td>{{ $order?->orderTotal() * ($order->purchaser->percentage) }}</td>
                                <td class=" text-blue-500 bg-red-600">
                                    <x-modal-component :order="$order">
                                        view items
                                    </x-modal-component>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-2">
            {{ $orders->links() }}
        </div>
    </div>
</x-app-layout>
