import { Component, Input, OnInit } from '@angular/core';


@Component({
  selector: 'app-cube-md',
  standalone: true,
  imports: [],
  templateUrl: './cube-md.component.html',
  styleUrl: './cube-md.component.css'
})
export class CubeMdComponent implements OnInit  {
  @Input() size: string = '50em';

  ngOnInit(){
    const hostElement = document.querySelector('app-cube-md') as HTMLElement;
    if (hostElement) {
      hostElement.style.setProperty(`--cube-size`, this.size);
    }
  }
}
