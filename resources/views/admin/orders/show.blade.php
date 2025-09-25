<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }} - {{ $order->order_number }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Order Information</h3>
                            <div class="space-y-2">
                                <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                                <p><strong>Type:</strong> <span class="capitalize">{{ $order->type }}</span></p>
                                <p><strong>Status:</strong> 
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                        {{ $order->status === 'paid' ? 'bg-green-100 text-green-800' : 
                                           ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </p>
                                <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y H:i') }}</p>
                                @if($order->paid_at)
                                <p><strong>Paid Date:</strong> {{ $order->paid_at->format('F d, Y H:i') }}</p>
                                @endif
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold mb-4">Customer Information</h3>
                            <div class="space-y-2">
                                <p><strong>Name:</strong> {{ $order->user->name }}</p>
                                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                <p><strong>Phone:</strong> {{ $order->user->phone ?? 'Not provided' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4">Property Details</h3>
                        <div class="space-y-2">
                            <p><strong>Title:</strong> {{ $order->property->title }}</p>
                            <p><strong>Location:</strong> {{ $order->property->location }}</p>
                            <p><strong>Price:</strong> ${{ number_format($order->property->price, 2) }}</p>
                            <p><strong>Type:</strong> {{ ucfirst($order->property->type) }}</p>
                        </div>
                    </div>

                    @if($order->type === 'rental')
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-4">Rental Details</h3>
                        <div class="space-y-2">
                            <p><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($order->details['check_in'])->format('F d, Y') }}</p>
                            <p><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($order->details['check_out'])->format('F d, Y') }}</p>
                            <p><strong>Guests:</strong> {{ $order->details['guests'] }}</p>
                            <p><strong>Duration:</strong> {{ $order->details['days'] }} nights</p>
                            @if(!empty($order->details['special_requests']))
                            <p><strong>Special Requests:</strong> {{ $order->details['special_requests'] }}</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    <div class="mb-8 p-4 bg-gray-50 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Payment Summary</h3>
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-semibold">Total Amount:</span>
                            <span class="text-2xl font-bold text-green-600">{{ $order->formatted_amount }}</span>
                        </div>
                    </div>

                    <div class="flex space-x-4">
                        @if($order->status === 'pending')
                            <form action="{{ route('admin.orders.mark-paid', $order) }}" method="POST">
                                @csrf
                                <x-primary-button type="submit">Mark as Paid</x-primary-button>
                            </form>
                        @endif
                        
                        <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="flex space-x-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="border-gray-300 rounded-md shadow-sm">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            <x-primary-button type="submit">Update Status</x-primary-button>
                        </form>

                        <x-secondary-button>
                            <a href="{{ route('admin.orders.index') }}">Back to Orders</a>
                        </x-secondary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>