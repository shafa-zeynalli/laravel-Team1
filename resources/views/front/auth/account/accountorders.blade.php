@extends('front.auth.account.index')

@section('account_content')
    <table>
        <thead>
        <tr class="th">
            <th>Order Num</th>
            <th>Date</th>
            <th>Status</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>{$val['product_id']}</td>
            <td>$yeniTarix</td>
            <td>{$val['status']}</td>
            <td>$<span>{$val['price']}</span></td>
            <td>View</td>
        </tr>

        </tbody>
    </table>
@endsection
