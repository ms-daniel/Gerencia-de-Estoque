import { Component } from '@angular/core';
import { CubeSmComponent } from '../../components/cube-sm/cube-sm.component';
import { CubeMdComponent } from '../../components/cube-md/cube-md.component';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [CubeSmComponent, CubeMdComponent],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {

}
