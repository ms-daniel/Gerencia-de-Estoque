import { Component, Input, OnInit, AfterViewInit, ElementRef } from '@angular/core';

@Component({
  selector: 'app-cube-sm',
  standalone: true,
  imports: [],
  templateUrl: './cube-sm.component.html',
  styleUrl: './cube-sm.component.css'
})
export class CubeSmComponent implements OnInit, AfterViewInit  {
  @Input() size: string = '50em';

  private colors: string[] = [
    '#3D3B40', '#525CEB', '#BFCFE7', '#F8EDFF', '#0766AD', '#29ADB2'
  ];

  constructor(private el: ElementRef) {}

  ngOnInit(){
    const hostElement = document.querySelector('app-cube-sm') as HTMLElement;
    if (hostElement) {
      hostElement.style.setProperty(`--cube-size`, this.size);
    }
  }

  ngAfterViewInit() {
    const cube = this.el.nativeElement.querySelector('.cube');

    // Function to set a random color
    const setRandomColor = () => {
      const color = this.colors[Math.floor(Math.random() * this.colors.length)];
      Array.from(cube.querySelectorAll('.cube__face')).forEach(face => {
        (face as HTMLElement).style.backgroundColor = color;
      });
    };

    // Listen for animationiteration events on cube
    cube.addEventListener('animationiteration', () => {
      setRandomColor();
    });

    // Set initial color
    setRandomColor();
  }
}
