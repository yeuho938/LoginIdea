##Database  

CREATE TABLE users  
(  
  id INT(10) PRIMARY KEY AUTO_INCREMENT,  
  name VARCHAR(50),  
  username VARCHAR (50),  
  password VARCHAR(50),  
  phone VARCHAR(50),  
  email VARCHAR(50),  
  role VARCHAR(50)  
);  
  
##Ý tưởng làm chức năng đăng ký    
  
###Tạo form đăng ký trong   
+ Gồm các trường : name, username,password,phone,email,role.  
+ Đặt tên tương ứng trong thẻ input  
+ Trong thẻ <form> chú ý các thông số sau:  
	. Action: tên địa chỉ trong Route(đến phần xứ lý trong đăng ký trong Controller).  
    . Method : POST  
    . enctype=" multipart/form-data"  
    . @csrf  
    . Thêm button có type="submit"  

  
###Tạo Controller: tên RegisterController  

Tạo hai function:  
  - index(): Trả về form đăng ký.  
     + Dùng return view("Tên file bạn muốn vào") KHÔNG phải là địa chỉ trong Route n.  
  - register(Request $request): Lấy dữ liệu từ form đăng ký và lưu dữ liệu vào database.      
     + Lấy dữ liệu từ form đăng ký:  
      . Cách lấy: $tênbiến = $request ->tênTrongFormInput;  
      . Đối với trường "password" thì câu lệnh:$tênbiến = Hash::make($password)  
      -> Mục địch của câu lệnh này là để mã hóa mật khẩu của người dùng trong database để tăng tính bảo mật cho account của người dùng.  
     + Lưu dữ liệu vào database:  
      DB::table('tên bang')->insert(  
			["Tên trong database" => $tênbiến(=$request ->tênTrongFormInput), "Tên trong database" => $tênbiến(=$request ->tênTrongFormInput),...]);  
##Ý tưởng làm chức năng đăng nhập

###Tạo form đăng nhập  
+ Gồm username và password  
+ Lưu ý: Đặt tên trong các thẻ input giống(or không) với database để nhập dữ liệu  
Trong thẻ form cần chú ý các điều sau:  
+ action: chọn đường dẫn bạn muốn di chuyển sau khi nhấn <button> Login :: Đường dẫn trong Route  
+ method: POST  
+ ectype = "multipart/form-data"  
+ @csrf  
+ Cần có một <button type ="submit">LOGIN</button>  
 
###Trong form LoginController  
+ Cần 2 function  
 1. index  
+ Trả về form đăng kí  
+ Dùng return view ("tên file mà bạn muốn vào); Không phải là địa chỉ Route  
  ```  
function index()  
    {  
      return view("auth.login");  
    }  
```  
 
 2. login  
+```login(Request $request):  
$username = $request->username;  
        $password = $request->password; ```  Lấy dữ liệu từ form đăng nhập  
+ $user = DB::table("users")->where(["username" => $username])->first(); Dùng để check username  
+ if ($user) {  
            if (Hash::check($password, $existingHashFromDb)) {  
              if ($user->role == "adimin") {  
                     return redirect()->route('/admin.dashboard');  
                } else {  
                   return redirect()->route('home');  
               }  
Dùng để kiểm tra role. Nếu role là admin thì dùng ``` return redirect()->route('/admin.dashboard');```  chuyển đến trang admin  
Nếu là user thì chuyển đến trang home.  
```  
else {  
           return redirect()->route("auth.login", ["error" => "Invalid username or password"]);  
       }  
```  
Ngược lại thì thông báo là sai username hoặc password  
 
Source Code  
```  
function login(Request $request)  
    {  
        $username = $request->username;  
        $password = $request->password;  
        $user = DB::table("users")->where(["username" => $username])->first();  
        $existingHashFromDb = $user->password;  
        if ($user) {  
            if (Hash::check($password, $existingHashFromDb)) {  
              if ($user->role == "adimin") {  
                    return redirect()->route('/admin.dashboard');  
                } else {  
                   return redirect()->route('home');  
               }  
           }  
       } else {  
           return redirect()->route("auth.login", ["error" => "Invalid username or password"]);  
       }  
}  
```   

###Route  
  
//Địa chỉ đến function xử lý trong controller nên dùng "post"  
Route::post('tên địa chỉ ', 'tên controller@tên function xử lý trong controller đó');  

//Địa chỉ đến function form đăng ký trong controller nên dùng "get"  
Route::get('tên địa chỉ', 'tên controller@tên function đến form đăng ký trong controller đó');  


###Những thứ cần Import : 
use Illuminate\Support\Facades\DB;// để liên kết được với database
use Illuminate\Http\Request; // để dùng được Request
use Illuminate\Support\Facades\Hash; 

