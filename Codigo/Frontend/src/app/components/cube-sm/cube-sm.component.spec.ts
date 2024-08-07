import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CubeSmComponent } from './cube-sm.component';

describe('CubeSmComponent', () => {
  let component: CubeSmComponent;
  let fixture: ComponentFixture<CubeSmComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CubeSmComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(CubeSmComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
