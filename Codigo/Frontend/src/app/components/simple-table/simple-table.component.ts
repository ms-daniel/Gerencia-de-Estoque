import { CommonModule } from '@angular/common';
import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-simple-table',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './simple-table.component.html',
  styleUrl: './simple-table.component.css'
})
export class SimpleTableComponent {
  @Input() title: string = '';
  @Input() data: any[] = [];

}
