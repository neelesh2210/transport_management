 <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Company Code</th>
                  <th>Company Logo</th>
                  <th>Company Location</th>
                  <th>Company Branch Name</th>
                  <th>Company Branch Code</th>
                  <th>Comapany Branch Location</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
               @foreach($data as $item)

                <tr> 
                    
                	<td>{{$item->company_name}}</td>
                	<td>{{$item->company_code}}</td>
                	<td> <img id="blah" src="{{ public_path('images/images.jpg') }}" alt="your image"  style="height:100px;width:100px;" /></td>
                	<td>{{$item->company_location}}</td>
                	<td>{{$item->company_branch_name}}</td>
                	<td>{{$item->company_branch_code}}</td>
                	<td>{{$item->company_branch_location}}</td>
                	<td>{{$item->status}}</td>
                	
                </tr>

                @endforeach
                </tbody>
              </table>