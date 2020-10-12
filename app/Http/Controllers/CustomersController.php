<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomersController extends Controller
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * Display a listing of the resource.
     *
     * @param CustomerRepository $customerRepository
     */

    public function __construct(CustomerRepositoryInterface $customerRepository){
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
       return $this->customerRepository->all();

//        return Customer::orderBy('name')
//            ->where('active', 1)
//            ->with('user')
//            ->get()
//            ->map(function($customer){
//                return[
//                    'customer_id'=>$customer->id,
//                    'name'=>$customer->name,
//                    'created_by'=>$customer->user->email,
//                    'last_updated'=>$customer->updated_at->diffForHumans()
//                ];
//            });

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customerId
     * @return Response
     */
    public function show($customerId)
    {
        return $this->customerRepository->findById($customerId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function update($customerId)
    {
        $this->customerRepository->update($customerId);

        return redirect('/customer/'.$customerId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function destroy($customerId)
    {
        $this->customerRepository->delete($customerId);

        return redirect('/');
    }


}
