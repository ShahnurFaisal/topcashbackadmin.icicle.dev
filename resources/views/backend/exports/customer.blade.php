<table>
    <thead>
        <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Payment Information</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp
        @foreach($customer as $customers)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$customers->name}}
            </td>
            <td>{{$customers->phone}}
            </td>
            <td>{{$customers->email}}</td>
            <td>{{$customers->address}}</td>
            <td>{{$customers->payment_information}}</td>
        </tr>
        @endforeach
    </tbody>
</table>