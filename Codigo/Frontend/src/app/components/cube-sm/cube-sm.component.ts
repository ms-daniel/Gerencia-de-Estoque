import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-cube-sm',
  standalone: true,
  imports: [],
  templateUrl: './cube-sm.component.html',
  styleUrl: './cube-sm.component.css'
})
export class CubeSmComponent implements OnInit  {
  @Input() size: string = '50em';

  ngOnInit(){
    const hostElement = document.querySelector('app-cube-sm') as HTMLElement;
    if (hostElement) {
      hostElement.style.setProperty(`--cube-size`, this.size);
    }
  }
}
