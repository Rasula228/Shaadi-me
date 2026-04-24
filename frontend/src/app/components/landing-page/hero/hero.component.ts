import {
  AfterViewInit,
  Component,
  ElementRef,
  EventEmitter,
  Input,
  OnDestroy,
  Output,
  ViewChild
} from '@angular/core';
import { HeroSlide } from '../landing.types';

@Component({
  selector: 'app-hero',
  standalone: false,
  templateUrl: './hero.component.html',
  styleUrl: './hero.component.scss'
})
export class HeroComponent implements AfterViewInit, OnDestroy {
  @Input({ required: true }) slides: HeroSlide[] = [];
  @Output() startPlanning = new EventEmitter<void>();
  
  @ViewChild('video1') private video1!: ElementRef<HTMLVideoElement>;
  @ViewChild('video2') private video2!: ElementRef<HTMLVideoElement>;

  activeIndex = 0;
  activePlayer: 1 | 2 = 1;
  private autoplayTimer: number | undefined;

  ngAfterViewInit() {
    this.initializeVideos();
    this.startAutoplay();
  }

  ngOnDestroy() {
    if (this.autoplayTimer) {
      window.clearInterval(this.autoplayTimer);
    }
  }

  selectSlide(index: number) {
    if (this.activeIndex === index) return;
    this.activeIndex = index;
    this.swapVideo();
    this.resetAutoplay();
  }

  scrollToThemes() {
    document.querySelector('#themes')?.scrollIntoView({ behavior: 'smooth' });
  }

  private startAutoplay() {
    if (!this.slides.length) {
      return;
    }

    this.autoplayTimer = window.setInterval(() => {
      this.activeIndex = (this.activeIndex + 1) % this.slides.length;
      this.swapVideo();
    }, 7000);
  }

  private resetAutoplay() {
    if (this.autoplayTimer) {
      window.clearInterval(this.autoplayTimer);
    }
    this.startAutoplay();
  }

  private initializeVideos() {
    if (!this.slides.length || !this.video1 || !this.video2) return;
    
    // Set the initial active video to the first slide
    this.video1.nativeElement.src = this.slides[0].video;
    
    // Preload the next slide in the background video
    if (this.slides.length > 1) {
      this.video2.nativeElement.src = this.slides[1].video;
    }
  }

  private swapVideo() {
    if (!this.video1 || !this.video2) return;

    const currentSlide = this.slides[this.activeIndex];
    
    // Toggle the active player flag to trigger CSS crossfade
    this.activePlayer = this.activePlayer === 1 ? 2 : 1;
    
    const activeVideo = this.activePlayer === 1 ? this.video1.nativeElement : this.video2.nativeElement;
    const inactiveVideo = this.activePlayer === 1 ? this.video2.nativeElement : this.video1.nativeElement;

    // Ensure the new active video has the correct src. 
    // Usually it was preloaded in the previous step, but we check just in case.
    if (!activeVideo.src.endsWith(currentSlide.video)) {
      activeVideo.src = currentSlide.video;
    }

    // Give the active video a programmatic push to play just in case autoplay fails
    activeVideo.play().catch(() => {});

    // Prepare the inactive video for the *next* slide in the sequence
    const nextIndex = (this.activeIndex + 1) % this.slides.length;
    
    // Wait for the CSS opacity transition (0.9s) to finish before changing the inactive video's source
    setTimeout(() => {
      inactiveVideo.src = this.slides[nextIndex].video;
      // Preload it silently
      inactiveVideo.load();
    }, 1000);
  }
}
