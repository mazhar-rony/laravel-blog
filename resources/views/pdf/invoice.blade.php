<style>
    #categories {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #categories td, #categories #th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #categories tr:nth-child(even){background-color: #f2f2f2;}
    
    #categories tr:hover {background-color: #ddd;}
    
    #categories #th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
</style>

<table id="categories">
    <tr id="th">
        <td>Id</td>
        <td>Name</td>
        <td>Description</td>
        <td>Date</td>
    </tr>

    @foreach ($cat as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->description }}</td>
            <td>{{ $c->created_at }}</td>
        </tr>
    @endforeach
</table>
