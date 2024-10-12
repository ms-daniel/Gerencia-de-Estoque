import { Component } from '@angular/core';
import { CubeSmComponent } from '../../components/cube-sm/cube-sm.component';
import { CubeMdComponent } from '../../components/cube-md/cube-md.component';
import { Login } from '../../_models/login';
import { FormsModule } from '@angular/forms';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CubeSmComponent, CubeMdComponent, FormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  login: Login = {
    email: 'ms_danniel@outlook.com ',
    password: 'password'
  };

  showPassword: boolean = false;

  constructor(private authService: AuthService){}

  authenticate() {
    this.authService.login(this.login).subscribe({
      next: (response) => {
        console.log('Token received: ', response);
        const cookies = response.headers.get('Set-Cookie');
        console.log('headers: ', response.headers);
      },
      error: (err) => {
        console.error('Something went wrong: ', err);
      },
      complete: () => {
        console.log('Login completed: ');
        console.log(this.getUsers());
      },
    });
  }

  togglePasswordVisibility() {
    this.showPassword = !this.showPassword;
  }
  getUsers(){
    return this.authService.getUsers();
  }

}

