import { Component } from '@angular/core';
import { CubeSmComponent } from '../../components/cube-sm/cube-sm.component';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CubeSmComponent],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {

}
