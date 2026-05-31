                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-6">
                            Payment Summary
                        </h2>

                        <div class="flex justify-between py-4 border-b">
                            <span>Subtotal</span>
                            <span>${{ number_format( app(App\Modules\Basket\Services\Basket\Basket::class)->subTotal()) }}</span>
                        </div>

                        <div class="flex justify-between py-4 border-b">
                            <span>Shipping</span>
                            <span>${{ number_format(100) }}</span>
                        </div>

                        <div class="flex justify-between py-4 font-semibold">
                            <span>Total</span>
                            <span>${{ number_format(app(App\Modules\Basket\Services\Basket\Basket::class)->subTotal() + 100) }}</span>
                        </div>
                    </div>
